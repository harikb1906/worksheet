@extends('layouts.master')
@section('title' , 'Edit User')

@section('content')
    <h1>Edit User</h1>
    <div class="container" id="form">

        <div class="card bg-secondary">
            <div class="card-body">
                <h4 class="card-title">Form:</h4>
                <p class="card-description">Register a new employee</p>
                @include('layouts.errors')
                <form class="forms-sample" action="{{route('users.update',$user->id)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label>Full Name:</label>
                        <input class="form-control form-control-sm " name="name" type="text" value="{{$user->name}}"/>
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input class="form-control form-control-sm" name="email" type="email" value="{{$user->email}}"/>
                    </div>
                    <div class="form-group">
                        <label>User Name:</label>
                        <input class="form-control form-control-sm " name="user_name" type="text"
                               value="{{$user->user_name}}"/>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label>Password:</label>
                            <input class="form-control form-control-sm" name="password" type="password"
                                   value="{{$user->password}}"/>
                        </div>
                        <div class="col">
                            <label>Confirm Password:</label>
                            <input class="form-control form-control-sm" name="password_confirmation" type="password"
                                   value="{{$user->password}}"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-behance" type="submit">
                                <i class="mdi mdi-account-edit"></i>
                                Update
                            </button>
                        </div>
                </form>

                <div class="col">
                    <form action="{{route('users.destroy' , $user->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger " style="float:right" type="submit">
                            <i class="mdi mdi-delete"></i>
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
