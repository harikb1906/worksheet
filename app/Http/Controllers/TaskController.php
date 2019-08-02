<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Project;
use App\Task;
use App\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function toggleComplete(Task $task , Request $request)
    {
        $task->update(['completed' => $request->has('completed')]);
        return redirect('/tasks');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $users = User::all();
        if (auth()->user()->admin == 1) $projects = Project::all();
        else         $projects = auth()->user()->projects;
        $tasks = Task::all();
        return view('tasks.index', compact('tasks', 'users' , 'projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        Task::create($request->all());
        return redirect('/tasks')->with('success' , 'Task added successfully')->with('tab' , '2');
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Task $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Task $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        if (auth()->user()->admin == 1) $projects = Project::all();
        else         $projects = auth()->user()->projects;
        return view('tasks.edit' , compact('task' , 'projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Task $task
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, Task $task)
    {
//                dd($request->all());
        $task->update($request->all());
        return redirect('/tasks')->with('success' , 'Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Task $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
//        dd(true);
        $task->delete();
        return redirect('/tasks')->with('success' , 'Task deleted successfully');
    }
}
