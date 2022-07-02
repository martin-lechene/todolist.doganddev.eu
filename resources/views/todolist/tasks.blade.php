@extends('layouts.app')


@section('content')
<div class="card rounded p-3">
    <!-- Bootstrap Boilerplate... -->
    @guest
    <div class="panel-body">
        <div class="alert alert-danger">
            <strong>You are not authorized to view this page.</strong>
        </div>
    </div>
    @else
<!-- Display Validation Errors -->
    @include('common.errors')
<!-- New Task Form -->
    <form action="{{ url('task') }}" method="POST" class="form-horizontal">
    {!! csrf_field() !!}
<!-- Task Name -->
        <div class="form-group p-2 pt-3">
            <label for="task" class="control-label font-weight-bold">Task</label>
            <input type="text" name="name" id="task-name" class="form-control rounded">
        </div>
<!-- Add Task Button -->
        <div class="form-group pt-3">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-primary rounded">
                    <i class="fa fa-plus"></i> Add Task
                </button>
            </div>
        </div>
    </form>
    <div class="p-3">
    @if (count($tasks) > 0)
            <strong>Tasks:</strong>
            <div class="row">
                @foreach ($tasks as $task)
                <div class="col-md-6">
                    <div class="card rounded m-2 p-2">
                        <h6 class="header-card text-center">{{ $task->name }}</h6>
                        <div class="body-card text-center">
                            <div class="p-2">
                                @if ($task->completed == 1)
                                <label class="text-success">Completed</label>
                                @elseif ($task->completed == 2)
                                <label class="text-danger">In wait</label>
                                @elseif ($task->completed == 0)
                                <label class="text-warning">Not Completed</label>
                                @else
                                <label class="text-danger">No status</label>
                                @endif
                            </div>
                        </div>
                        <div class="footer-card text-center">
                            @guest
                                <div class="alert alert-warning">No logged</div>
                            @elseif (Auth::user()->id == $task->user_id)
                                <a href="{{ url('task/'.$task->id) }}" class="btn btn-info">View</a>
                                <a href="{{ url('task/'.$task->id.'/edit') }}" class="btn btn-warning">Edit</a>
                                <a href="{{ url('task/'.$task->id.'/delete') }}" class="btn btn-danger">Delete</a>
                            @elseif (Auth::user()->role == 'admin')
                                <a href="{{ url('task/'.$task->id) }}" class="btn btn-info">View</a>
                                <a href="{{ url('task/'.$task->id.'/edit') }}" class="btn btn-warning">Edit</a>
                                <a href="{{ url('task/'.$task->id.'/delete') }}" class="btn btn-danger">Delete</a>
                            <!--  if user is group
                            {# @ elseif (Auth::user()->group->id == $group->id) #}
                                <a href="{{ url('task/'.$task->id) }}" class="btn btn-info">View</a>
                            -->
                            @else
                                <div class="alert alert-warning">It's not available</div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
    @else
        <div class="alert alert-info">
            <strong>No tasks found.</strong>
        </div>
    @endif
    </div>
<!-- TODO: Current Tasks -->
    @endguest
</div>
@endsection
