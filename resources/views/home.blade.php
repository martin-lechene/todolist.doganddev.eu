@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">{{ __('Dashboard') }}</div>
        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <a class="btn btn-primary" href="#"><i class="fas fa-list"></i> {{ __('Lists all tasks') }}</a>
            <a class="btn btn-secondary" href="#"><i class="fas fa-plus"></i> {{ __('Create a task') }}</a>
        </div>
    </div>
</div>
    </div>
</div>
@endsection
