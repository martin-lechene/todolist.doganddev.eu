@extends('layouts.app')


@section('content')
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
    @endguest
@endsection

