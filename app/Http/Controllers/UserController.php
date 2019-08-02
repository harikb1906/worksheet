<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()            //for user page
    {
        $users = User::all()->where('admin', 0);
//        return $users;

        return view('employee.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()   //Not using
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)      //adding employee to DB
    {

//        dd($request->get('password'));
        $request->validate([
            'name' => 'required',
            'user_name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',

        ]);
        $attributes = $request->all();
//        dd($attributes['password']);
        $attributes['password'] = Hash::make($request->password);
//        dd($attributes);
        User::create($attributes);
        return redirect('/users')->with('success', 'Employee Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)       //Not Using
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)        //editing an employee(form)
    {
        return view('employee.edit', compact('user'));
    }

    /**
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @created by hari@protracked.in
     */
    public function update(Request $request, User $user)       //editing an employee(backend)
    {
        $request->validate([
            'name' => 'required',
            'user_name' => 'required|unique:users,user_name,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'required|confirmed|min:6',

        ]);
        $user->update($request->all());
        return redirect('/users')->with('success', 'Employee edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)        //destroying a user
    {
        $user->delete();
        return redirect('/users')->with('success', 'Employee Deleted Successfully');
    }
}
