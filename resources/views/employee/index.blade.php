@extends('layouts.master')
@section('title', 'Users')

@section('content')
    <h1>Employee</h1>
    <div class="card">
        <div class="card-body">
            {{--            <h4 class="card-title">Data table</h4>--}}
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <table id="order-listing" class="table table-striped table-secondary" cellspacing="0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Employee Id</th>
                            <th>Name</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key => $user)
                            <tr>
                                <td>{{$key}}</td>
                                <td>{{$user->id}}</td>
                                <td>{{ucwords($user->name)}}</td>
                                <td>{{$user->user_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <a class="btn btn-outline-primary" href="{{route('users.edit',$user->id)}}">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    {{--    Form--}}
    <button class="btn btn-behance" onclick="addForm()">Add Employee</button>
    <div class="container" id="form" style="display:{{$errors->any() ? 'block' : 'none' }} ">
        <div class="card bg-secondary">
            <div class="card-body">
                <h4 class="card-title">Form for adding an employee:</h4>
                <p class="card-description">Register a new employee</p>
                @include('layouts.errors')
                <form class="forms-sample" action="{{route('users.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Full Name:</label>
                        <input class="form-control form-control-sm " name="name" type="text" value="{{old('name')}}"/>
                    </div>
                    {{--@error('name')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </div>
                    @enderror
--}}
                    <div class="form-group">
                        <label>Email:</label>
                        <input class="form-control form-control-sm" name="email" type="email" value="{{old('email')}}"/>
                    </div>
                    <div class="form-group">
                        <label>User Name:</label>
                        <input class="form-control form-control-sm " name="user_name" type="text"
                               value="{{old('user_name')}}"/>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label>Password:</label>
                            <input class="form-control form-control-sm" name="password" type="password"
                                   value="{{old('password')}}"/>
                        </div>
                        <div class="col">
                            <label>Confirm Password:</label>
                            <input class="form-control form-control-sm" name="password_confirmation" type="password"
                                   value="{{old('password_confirmation')}}"/>
                        </div>
                    </div>
                    <button class="btn btn-behance" type="submit">Add</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function addForm() {
            var x = document.getElementById('form');
            if (x.style.display == 'none')
                document.getElementById('form').style.display = "block";
            else document.getElementById('form').style.display = "none";
        }
    </script>
@endsection
