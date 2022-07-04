@extends("admin.dashboard")


@section('admin.content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Welcome page</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

@guest
    <div class="alert alert-warning">You are connected but not admin !</div>
    <div class="container text-center">
        <div class="row">
            <div class="col-6">
                <h3>Welcome to you app todolist !</h3>
            </div>

            <div class="col-6">
                <a href="/login" class="btn btn-primary">Login</a>
                <a href="/register" class="btn btn-primary">Register</a>
            </div>
        </div>
    </div>
@elseif (Auth::user()->role == 'admin')
    <div class="alert alert-success">You are connected and admin !</div>
    <div class="container text-center">
        <div class="row">
            <div class="col-6">
                <h3>Welcome to you app todolist !</h3>
                <div class="divider"></div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo sint, ut et veniam distinctio expedita saepe repellendus repudiandae laboriosam aut.</p>
            </div>
            <div class="col-6">
                <h3>Information App Laravel :</h3>
                <p>APP_NAME : <code>{{ env('APP_NAME') }}</code></p>
                <p>APP_ENV : <code>{{ env('APP_ENV') }}</code></p>
                <p>APP_KEY : <code>{{ env('APP_KEY') }}</code></p>
                <p>APP_DEBUG : <code>{{ env('APP_DEBUG') }}</code></p>
                <p>APP_URL : <code>{{ env('APP_URL') }}</code></p>

            </div>
        </div>
    </div>
@else
    <div class="alert alert-danger">You are not connected and admin !</div>
    <div class="container text-center">
        <div class="row">
            <div class="col-6">
                <h3>Welcome to you app todolist !</h3>
            </div>
            <div class="col-6">
                <a href="/login" class="btn btn-primary">Login</a>
                <a href="/register" class="btn btn-primary">Register</a>
            </div>
        </div>
    </div>
@endguest

@endsection
