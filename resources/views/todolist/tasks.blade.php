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

    <div class="p-3">
    @if (count($tasks) > 0)
            <div class="row">
                <h3>{{ __('3 task remains') }}</h3>
                @foreach ($tasks as $task)
                    @if ($task->user_id == Auth::user()->id)
                        @if ($task->completed == 0)
                            @if($loop->index < 3)
                            <ul class="custom-checkbox rounded">
                                <li>
                                    <form method="POST" action="{# { route('task', {# task id #}) } #}">
                                        <input type="checkbox" value="1" id="{# id #}">
                                        <label for="{# id #}">
                                            <i class="fas fa-times text-danger"></i>
                                            {{ $task->name }}
                                        </label>
                                    </form>
                                </li>
                            </ul>
                            @endif
                        @endif
                    @endif
                @endforeach
                <!-- If tasks is not completed  -->
                <!-- If tasks is completed  -->
                <h4>{{ __('Completed tasks') }}</h4>
                <div class="col-12">
                @foreach ($tasks as $task)
                    @if ($task->user_id == Auth::user()->id)
                        @if ($task->completed == 1)
                            <ul class="custom-checkbox">

                                <li>
                                    <input  type="checkbox" id="{# task id #}" checked disabled />
                                    <label  for="{# task id #}">
                                        <i class="fa fa-check-circle text-success"></i>
                                    {{ $task->name }}
                                    </label>
                                </li>
                            </ul>
                        @endif
                    @endif
                @endforeach
                </div>
            </div>
    @else
        <div class="alert alert-info">
            <strong>No tasks found.</strong>
        </div>
    @endif
    </div>
    @if (Auth::user()->role == "society")
    <div class="text-center p-3">
        <a href="/tasks/add" class="btn btn-primary"><i class="fas fa-plus"></i> Create a news tasks</a>
    </div>
    @endif
<!-- TODO: Current Tasks -->
    @endguest
</div>
@endsection
