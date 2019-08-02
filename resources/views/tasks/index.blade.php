@extends('layouts.master')
@section('title' , 'Tasks')
@section('content')
    {{-- <div class="card">
            <div class="card-body">--}}
    {{--Tabs--}}
    <ul class="nav nav-tabs tab-basic" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="list-tab" data-toggle="tab" href="#list" role="tab"
               aria-controls="list" aria-selected="true">
                {{--                                                <i class="mdi mdi-home-outline"></i>--}}
                <h3>All Tasks</h3></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="form-tab" data-toggle="tab" href="#form" role="tab"
               aria-controls="form" aria-selected="false">
                {{--                        <i class="mdi mdi-home-outline"></i>--}}
                <h2 class="text-info">Add Tasks</h2>
            </a>
        </li>
    </ul>
    {{--Contents--}}
    <div class="tab-content tab-content-basic">

        <div class="tab-pane fade show " id="list" role="tabpanel" aria-labelledby="list-tab">
            {{--                    Tab-1, Projects list--}}
            <div class="card">
                @if(session('success'))
                    <div class="notification-bar alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                <div class="card-body">
                    <h4 class="card-title">Data table</h4>
                    <div class="row">
                        <div class="col-12">
                            <table id="order-listing" class="table" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Order #</th>
                                    <th>Task Id</th>
                                    <th>Project</th>
                                    <th>Task</th>
                                    <th>Description</th>
                                    <th>Due Date</th>
                                    <th>Created By</th>
                                    <th class="text-center">Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                               {{-- <tr>
                                    <td>1</td>
                                    <td>2012/08/03</td>
                                    <td>Edinburgh</td>
                                    <td>New York</td>
                                    <td>$1500</td>
                                    <td>$3200</td>
                                    <td>
                                        <label class="badge badge-info">On hold</label>
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-primary">View</button>
                                    </td>
                                </tr>--}}
                                @foreach($tasks as $key => $task)
                                    <tr>
                                        <td>{{$key}}</td>
                                        <td>{{$task->id}}</td>
                                        <td>{{$task->project->title}}</td>
                                        <td>{{$task->task}}</td>
                                        <td>{{$task->description}}</td>
                                        <td>{{$task->due_date}}</td>
                                        <td>{{$task->user->name}}</td>
                                        <td class="text-center">
                                            <label class="badge badge-danger {{$task->completed ? 'custom' : ''}}">{{$task->completed ? 'Completed' : 'Pending'}}</label>
                                        </td>
                                        <td>
                                            <a href="{{route('tasks.edit' , $task->id)}}" class="btn btn-outline-info">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

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
                        <form class="forms" action="{{route('tasks.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="owner_id" value="{{auth()->user()->id}}">
                            <div class="form-group">
                                <label>Task:</label>
                                <input class="form-control form-control-sm " name="task" type="text"
                                       value="{{old('task')}}"/>
                            </div>
                            <div class="form-group">
                                <label>Description:</label>
                                <textarea class="form-control form-control-lg"
                                          name="description">{{old('description')}}</textarea>
                            </div>

                            <label for="project">Project</label>
                            <select class="js-example-basic form-control" name="project_id">
                                <option value=null >--</option>
                                @foreach($projects as $project)
                                    <option value="{{$project->id}}" >{{ucwords($project->title)}}</option>
                                @endforeach
                            </select>

                            {{--<div class="select2-container col-md-12">
                                <label for="manager[]">Manager</label>
                                <select class="js-example-basic-multiple form-control" name="manager[]"
                                        multiple>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{ucwords($user->name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div class="select2-container">
                            <label for="member[]">Member</label>
                                <select class="js-example-basic-multiple form-control" name="member[]"
                                        multiple>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{ucwords($user->name)}}</option>
                                    @endforeach
                                </select>
                            </div>--}}
                            <label for="due_date">Due date:</label>
                            <input type="date" name="due_date"
                                   value=""
                                   min="" max="" class="form-control">
                            <button class="btn btn-behance float-lg-right" type="submit">Add Project</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{--  </div>
          </div>--}}
    </div>
@endsection
@section('js-add')
    <script>
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection