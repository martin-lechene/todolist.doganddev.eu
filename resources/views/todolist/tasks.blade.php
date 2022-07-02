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
            <label for="task" class="control-label font-weight-bold">{{ __('Task') }}</label>
            <input type="text" name="name" id="task-name" class="form-control rounded">
        </div>
<!-- Add Task Button -->
        <div class="form-group pt-3">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-primary rounded">
                    <i class="fa fa-plus"></i> {{ __('Add Task') }}
                </button>
            </div>
        </div>
    </form>
    <div class="p-3">
    @if (count($tasks) > 0)
            <strong>{{ __('Tasks:') }}</strong>
            <div class="row">
                <h3>{{ __('3 task remains') }}</h3>
                @foreach ($tasks as $task)
                    @if (($task->id == Auth::user()->id) && ($task->completed == 0 ) )
                    <div class="col-12">
                        <table class="card rounded p-3">
                            <th>
                                <td><form method="POST" action="{# { route('task') } #}"><button type="submit" class="nav-link text-decoration-none bg-transparent border-0"><i class="fas fa-times"></i></button></form></td>
                                <td>{{ $task->name }}</td>
                            </th>
                        </table>
                    </div>
                    @endif
                @endforeach
                <!-- If tasks is not completed  -->
                <!-- If tasks is completed  -->
                <h4>{{ __('Completed tasks') }}</h4>
                @foreach ($tasks as $task)
                    @if ($task->completed == 1)
                    <div class="col-12">
                        <table class="card rounded p-3">
                            <th>
                                <td><form method="POST" action="{# { route('task') } #}"><button type="submit" class="nav-link text-decoration-none rounded-full bg-success border-1"><i class="text-white fas fa-check"></i></button></form></td>
                                <td>{{ $task->name }}</td>
                            </th>
                        </table>
                    </div>
                    @endif
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
