@extends('admin.dashboard')

@section('admin.content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">List of all tasks</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                     <li class="breadcrumb-item active">Tasks</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="card rounded p-3">
            @if (session('status'))
            <div class="card-header alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <div class="card-body text-center">
                <div class="card-body">
                    @guest
                    <div class="alert alert-danger">You are not <b>connected</b>.</div>
                    @elseif (Auth::user()->role == 'admin')
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Company</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $task->name }}</td>
                                <td>{{ $task->company }}</td><!--TODO: add ->name for name of company-->
                                <td class="d-flex justify-center">
                                    <a href="/management/tasks/{{ $task->id }}/edit" class="nav-link btn text-info"><i class="fas fa-edit"></i></a>
                                    <a href="/management/tasks/{{ $task->id }}/delete" class="nav-link btn text-danger"><i class='fas fa-trash-alt'></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="alert alert-danger">Error accces denied</div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
