<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Project;
use App\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @created by hari@protracked.in
     */
    public function index()
    {
        $users = User::all()->where('admin', '=',0);

        if (auth()->user()->admin == 1) {
            $projects = Project::orderBy('id', 'desc')->get();
        } else {
            $projects = auth()->user()->projects;
        }

        return view('projects.index', compact('projects', 'users'));
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
    public function store(ProjectRequest $request)
    {
        $member = $request->member;
        $manager = $request->manager;
        $project = Project::create($request->all());
        if ($request->has('manager')) {
            $project->managers()->attach($manager);
        }
        if ($request->has('member')) {
            $project->members()->attach($member);
        }
        return redirect('/projects')->with('success', 'Project Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * @param Project $project
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @created by hari@protracked.in
     */
    public function edit(Project $project)
    {
        $users = User::all()->where('admin', '=', 0);

        abort_if(auth()->user()->admin == 0, 403);
        return view('projects.edit', compact('project', 'users'));
    }

    /**
     * @param ProjectRequest $request
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @created by hari@protracked.in
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $project->update($request->all());
        if ($request->has('manager')) {
            $project->managers()->sync($request->manager);
        } else         $project->managers()->detach();

        if ($request->has('member')) {
            $project->members()->sync($request->member);
        } else         $project->members()->detach();

        return redirect('/projects')->with('success', 'Employee updated successfully');
    }

    /**
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     * @created by hari@protracked.in
     */

    public function destroy(Project $project)
    {
        $project->delete();
        $project->managers()->detach();
        $project->members()->detach();
        return redirect('/projects')->with('success', 'Project deleted Successfully');
    }
}
