@extends('layouts.master')
@section('title' , 'Project Edit')

@section('content')
    <h1>Edit</h1>
    <div class="container" id="form">
        <div class="card bg-secondary">
            <div class="card-body">
                <h4 class="card-title">Form:</h4>
                {{--                <p class="card-description">Update Project</p>--}}
                @include('layouts.errors')
                <form class="forms" action="{{route('projects.update' , $project->id)}}" method="post">

                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label>Title:</label>
                        <input class="form-control form-control-sm " name="title" type="text"
                               value="{{$project->title}}"/>
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <textarea class="form-control form-control-lg"
                                  name="description">{{$project->description}}</textarea>
                    </div>
                    <br>
                    <div class="select2-container--default">
                        <label for="manager">Manager</label>
                        <select class="js-example-basic-multiple form-control" name="manager[]" multiple>
                            @foreach($users as $user)
                                <option value="{{$user->id}}" @if($project->managers->where('id',$user->id)->count()) selected @endif>{{ucwords($user->name)}}</option>
                            @endforeach
                        </select>
                        <label for="manager">Member</label>
                        <select class="js-example-basic-multiple form-control" name="member[]" multiple>
                            @foreach($users as $user)
                                <option value="{{$user->id}}" @if($project->members->where('id',$user->id)->count()) selected @endif>{{ucwords($user->name)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-behance" type="submit">Update Project</button>
                </form>
                <form action="{{route('projects.destroy' , $project->id)}}" method="post" class="delete">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js-add')
    <script>
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection