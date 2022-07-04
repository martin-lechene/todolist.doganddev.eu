@extends('layouts.app')

@section('content')
<!-- Form 'post' for send a invite link -->
<div class="card rounded p-3">
    @if (session('status'))
    <div class="card-header alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="card-body text-center">
        <div class="card-body">
            <h2>Create a invite message</h2>
            @guest
            <div class="alert alert-danger">Error 404</div>
            @else
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            <a class="btn btn-primary" href="/send-link"><i class="fas fa-list"></i> {{ __('Send link') }}</a>
            @endguest
        </div>
    </div>
@endsection
