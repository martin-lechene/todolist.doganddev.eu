@extends('layouts.app')


@section('content')
    <h1>To do list</H1>
    <!-- Bootstrap Boilerplate... -->
    @guest
        <div class="container">
            <div class="panel-body">
                <div class="alert alert-danger">
                    <strong>You are not authorized to view this page.</strong>
                </div>
            </div>
        </div>
    @else

    <div class="container">
        <!-- Display Validation Errors -->
        @include('common.errors')
        <!-- New Task Form -->
       <div class="card w-50">
            <form action="{{ url('task') }}" method="POST" class="form-horizontal">
                {!! csrf_field() !!}
                <!-- Task Name -->
                <div class="card-body">
                    <div class="form-group">
                        <label for="task" class="col-sm-3 control-label">Task</label>
                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control">
                        </div>
                    </div>
                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus"></i> Add Task
                            </button>
                        </div>
                    </div>
                </div>
            </form>
       </div>
    </div>
        <!-- TODO: Current Tasks -->
    @endguest
    @endsection
