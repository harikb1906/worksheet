@extends('layouts.master')
@section('title' , 'Projects')

@section('content')
        {{--<div class="card">
            <div class="card-body">--}}
        {{--            <h1 class="card-title">Projects</h1>--}}
        {{--Tabs--}}
        <ul class="nav nav-tabs tab-basic" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="list-tab" data-toggle="tab" href="#list" role="tab"
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

            <div class="tab-pane fade show " id="list" role="tabpanel" aria-labelledby="list-tab">
                {{--                    Tab-1, Projects list--}}
                {{$tasks}}
                <div class="card">
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
                                        {{--                            <th>Due Date</th>--}}
                                        <th>Created By</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
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
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>2015/04/01</td>
                                        <td>Doe</td>
                                        <td>Brazil</td>
                                        <td>$4500</td>
                                        <td>$7500</td>
                                        <td>
                                            <label class="badge badge-danger">Pending</label>
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-primary">View</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>2010/11/21</td>
                                        <td>Sam</td>
                                        <td>Tokyo</td>
                                        <td>$2100</td>
                                        <td>$6300</td>
                                        <td>
                                            <label class="badge badge-success">Closed</label>
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-primary">View</button>
                                        </td>
                                    </tr>

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
@endsection
@section('js-add')
    <script>
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection