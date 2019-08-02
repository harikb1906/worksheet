@extends('layouts.master')
@section('title' , 'Edit Task')

@section('content')
    <div class="card bg-secondary">
        <div class="card-body">
            <h4 class="card-title">Form:</h4>
            <div>
                <form action="/task/{{$task->id}}/complete" method="post">
                    @csrf
                    @method('patch')
                    <label for="completed">
                        <input type="checkbox" name="completed" class="checkbox" onchange="this.form.submit()" @if($task->completed) checked @endif >
                        Completed
                    </label>
                </form>
            </div>
            @include('layouts.errors')
            <form class="forms" action="{{route('tasks.update' , $task->id)}}" method="post">
                @csrf
                @method('PATCH')
                <input type="hidden" name="owner_id" value="{{auth()->user()->id}}">
                <div class="form-group">
                    <label>Task:</label>
                    <input class="form-control form-control-sm " name="task" type="text"
                           value="{{$task->task}}"/>
                </div>
                <div class="form-group">
                    <label>Description:</label>
                    <textarea class="form-control form-control-lg"
                              name="description">{{$task->description}}</textarea>
                </div>

                <label for="project">Project</label>
                <select class="js-example-basic form-control" name="project_id">
                    @foreach($projects as $project)
                        <option value="{{$project->id}}">{{ucwords($project->title)}}</option>
                    @endforeach
                </select>


                <div class="form-group">
                    <label for="due_date">Due date:</label>
                    <input type="date" name="due_date"
                           value="{{$task->due_date}}"
                           min="" max="" class="form-control">
                </div>
                <button class="btn btn-behance" type="submit">Add Project</button>
            </form>
            <form action="{{route('tasks.destroy' , $task->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection
{{--$("select").val([]);--}}
