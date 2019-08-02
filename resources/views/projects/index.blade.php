@extends('layouts.master')
@section('title' , 'Projects')

@section('content')
    @if(auth()->user()->admin == 1)
        {{--<div class="card">
            <div class="card-body">--}}
        {{--            <h1 class="card-title">Projects</h1>--}}
        {{--Tabs--}}
        <ul class="nav nav-tabs tab-basic" role="tablist">
            <li class="nav-item">
                <a class="nav-link " id="list-tab" data-toggle="tab" href="#list" role="tab"
                   aria-controls="list" aria-selected="true">
                    {{--                                                <i class="mdi mdi-home-outline"></i>--}}
                    <h3>All Projects</h3></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="form-tab" data-toggle="tab" href="#form" role="tab"
                   aria-controls="form" aria-selected="false">
                    {{--                        <i class="mdi mdi-home-outline"></i>--}}
                    <h2 class="text-info">Add Projects</h2>
                </a>
            </li>
        </ul>
        {{--Contents--}}
        <div class="tab-content tab-content-basic">
            <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list-tab">
                @endif
                {{--                    Tab-1, Projects list--}}
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Projects</h4>
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif
                        <div class="accordion" id="accordion" role="tablist">

                            @foreach($projects as $key => $project)
                                <div class="card">
                                    <a data-toggle="collapse" href="#collapse{{$project->id}}"
                                       aria-expanded="false"
                                       aria-controls="collapse{{$project->id}}">
                                        <div class="card-header text-dark bg-secondary" role="tab"
                                             id="heading{{$project->id}}">
                                            {{++$key}})
                                            {{--                                                <h6 class="mb-0">--}}
                                            {{ucfirst($project->title)}}
                                            <i class="ti-angle-double-down text-dark float-right"></i>
                                            {{--                                                </h6>--}}
                                        </div>
                                    </a>

                                    <div id="collapse{{$project->id}}" class="collapse show" role="tabpanel"
                                         aria-labelledby="heading{{$project->id}}" data-parent="#accordion">
                                        <div class="card-body text-monospace ">
                                            @if(auth()->user()->admin == 1)
                                                <a href="{{route('projects.edit', $project->id)}}">
                                                    [<i class="ti-pencil"></i>]
                                                </a>
                                            @endif
                                            Description:
                                            <div class="ml-5">
                                                {{ucfirst($project->description)}}
                                            </div>
                                            <hr>
                                            Managers: @foreach($project->managers->pluck('name') as $manager) {{ucwords($manager)}}
                                            , @endforeach
                                            <br>
                                            Members: @foreach($project->members->pluck('name') as $member) {{ucwords($member)}}
                                            , @endforeach
                                            <br>
                                            <hr>
                                            <h6>Tasks</h6>
                                            <ul>
                                                @foreach($project->tasks as $task)
                                                    <li>{{$task->task}}</li>
                                                @endforeach
                                            </ul>
                                            {{--                                                    <i class="mdi mdi-alert-octagon mr-2"></i>--}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                @if(auth()->user()->admin == 1)
            </div>
            <div class="tab-pane fade" id="form" role="tabpanel" aria-labelledby="form-tab">
                {{--                    form--}}
                <br>
                <div class="container" id="form">
                    <div class="card bg-secondary">
                        <div class="card-body">
                            <h4 class="card-title">Form:</h4>
                            <p class="card-description">Add Project</p>
                            @include('layouts.errors')
                            <form class="forms" action="{{route('projects.store')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Title:</label>
                                    <input class="form-control form-control-sm " name="title" type="text"
                                           value="{{old('title')}}"/>
                                </div>
                                <div class="form-group">
                                    <label>Description:</label>
                                    <textarea class="form-control form-control-lg"
                                              name="description">{{old('description')}}</textarea>
                                </div>
                                <div class="select2-container">
                                    <label for="manager">Manager</label>
                                    <select class="js-example-basic-multiple form-control" name="manager[]"
                                            multiple>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{ucwords($user->name)}}</option>
                                        @endforeach
                                    </select>

                                    <label for="manager">Member</label>
                                    <select class="js-example-basic-multiple form-control" name="member[]"
                                            multiple>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{ucwords($user->name)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button class="btn btn-behance float-lg-right" type="submit">Add Project</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--</div>
    </div>--}}
    @endif
@endsection
@section('js-add')
    <script>
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection