@extends('layouts.app')


@section('content')
<div class="card rounded p-3">
    <!-- Bootstrap Boilerplate... -->
    @guest
    <div class="panel-body">
        <div class="alert alert-danger">
            <strong>{{__('You are not authorized to view this page.')}}</strong>
        </div>
    </div>
    @else
<!-- Display Validation Errors -->
    @include('common.errors')

    <div class="p-3">

    @if (count($tasks) > 0)
            <div class="row">
                @if (Auth::user()->role == 'admin')
                    <div class="d-flex justify-content-end font-weight-bold">
                        <a class="btn btn-secondary" href="/">
                            <i class="fa fa-plus"></i> <b>{{__('Add tasks')}}</b>
                        </a>
                    </div>
                @endif
                <h4>{{ __('3 task remains') }}</h4>
                @foreach ($tasks as $task)
                    @if (($task->user_id == Auth::user()->id) || (Auth::user()->role == 'admin') || ($task->company == Auth::user()->company))
                        @if ($task->completed == 0)
                            <ul class="custom-checkbox rounded">
                                <li>
                                    <form method="POST" action="route('task', $task->id)">
                                        <input type="checkbox" value="1" id="{{ $task->id }}">
                                        <label for="{{ $task->id }}">
                                            <i class="fas fa-times text-danger"></i>
                                            {{ $task->name }}
                                        </label>
                                    </form>
                                </li>
                            </ul>
                        @endif
                    @endif
                @endforeach
                <!-- If tasks is not completed  -->
                <!-- If tasks is completed  -->
                <h4>{{ __('Completed tasks') }}</h4>
                @foreach ($tasks as $task)
                    @if (($task->user_id == Auth::user()->id) || (Auth::user()->role == 'admin') || ($task->company == Auth::user()->company))
                        @if ($task->completed == 1)
                            <ul class="custom-checkbox">
                                <li>
                                    <input  type="checkbox" id="{{ $task->id }}" checked disabled />
                                    <label  for="{{ $task->id }}">
                                        <i class="fa fa-check-circle text-success"></i>
                                    {{ $task->name }}
                                    @if (Auth::user()->role == 'admin')
                                    <form method="POST" action="{{ route('task', task->id) }}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{# { csrf_token() } #}">
                                        <button type="submit" class="btn">
                                            <i class="fa fa-trash-alt text-danger"></i>
                                        </button>
                                    </form>
                                    @endif
                                    </label>
                                </li>
                            </ul>
                        @endif
                    @endif
                @endforeach
            </div>
    @else
        <div class="alert alert-info">
            <strong>{{ __('No tasks found.')}}</strong>
        </div>
    @endif
    </div>
    @if (Auth::user()->role == "society")
    <div class="text-center p-3">
        <a href="/tasks/add" class="btn btn-primary"><i class="fas fa-plus"></i> {{ __('Create a news tasks') }}</a>
    </div>
    @endif
<!-- TODO: Current Tasks -->
    @endguest
</div>
@endsection
