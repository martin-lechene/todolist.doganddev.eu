@extends('layouts.app')

@section('content')
<div class="card rounded p-3">
    @if (session('status'))
    <div class="card-header alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="card-body">
        <a class="btn btn-primary" href="/{{ __('tasks') }}"><i class="fas fa-list"></i> {{ __('Lists all tasks') }}</a>
        <a class="btn btn-secondary" href="#"><i class="fas fa-plus"></i> {{ __('Create a task') }}</a>
    </div>
</div>
@endsection
