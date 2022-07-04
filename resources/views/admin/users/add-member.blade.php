@extends('layouts.app')

@section('content')
<!-- Form 'post' for create member -->
<div class="card rounded p-3">
    @if (session('status'))
    <div class="card-header alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="card-body text-center">
        <div class="card-body">
            <h2>Create a new member</h2>
            @guest
            <div class="alert alert-danger">Error 404</div>
            @else
            <form method="POST" action="/{{ __('management/users') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Password confirmation</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password confirmation">
                </div>
                <input type="hidden" name="role" value="member">
                <input type="hidden" name="company" value="{# users.company #}">
                <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
            </form>
            @endguest
        </div>
    </div>

@endsection
