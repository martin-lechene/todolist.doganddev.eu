@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                @livewire('tasks-list')
            </div>
        </div>
    </div>
@endsection
