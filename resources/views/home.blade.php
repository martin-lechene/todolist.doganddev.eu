@extends('layouts.app')

@section('content')
<div class="card rounded p-3">
    @if (session('status'))
    <div class="card-header alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="card-body text-center">
        <div class="card-body">
            <h2>Create your tasks manager</h2>
        @guest
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo, officiis corrupti omnis rerum tenetur distinctio reiciendis eligendi ducimus provident aliquam eaque quisquam autem impedit debitis esse magnam, aperiam placeat assumenda eveniet corporis necessitatibus? Quos sed, porro ratione architecto dicta deserunt sint eligendi fugiat voluptatem tenetur!</p>
         @else
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo, officiis corrupti omnis rerum tenetur distinctio reiciendis eligendi ducimus provident aliquam eaque quisquam autem impedit debitis esse magnam, aperiam placeat assumenda eveniet corporis necessitatibus? Quos sed, porro ratione architecto dicta deserunt sint eligendi fugiat voluptatem tenetur!</p>
            <a class="btn btn-primary" href="/{{ __('tasks') }}"><i class="fas fa-list"></i> {{ __('Lists all tasks') }}</a>
         @endguest
        </div>
    </div>
</div>
@endsection
