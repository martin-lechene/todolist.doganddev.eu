<div>
        <div class="form">
        @guest
            <div class="alert alert-danger" role="alert">
                You must be logged in to create a task.
            </div>
        @else
            @if (Auth::user()->role == 'admin')
            <form>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" wire:model="state.name" id="name" placeholder="Name of task">
                    <label for="completed" class="form-label">Is completed</label>
                    <input type="checkbox" class="form-checkbox" wire:model="state.completed" id="completed" placeholder="">
                    <input type="hidden" wire:model="state.user_id" value="{{ Auth::user()->id }}">
                    @if (Auth::user()->company)
                        <input type="hidden" wire:model="state.company_id" value="{{ Auth::user()->company->id }}">
                    @endif
                </div>
                <div class="mb-3">
                    <button type="reset" wire:click.prevent="cancel" class="btn btn-secondary">Annuler</button>
                    @if ($updateMode)
                        <button type="submit" wire:click.prevent="update" class="btn btn-primary">Mettre à jour</button>
                    @else
                        <button type="submit" wire:click.prevent="store" class="btn btn-primary">Enregistrer</button>
                    @endif
                </div>
            </form>
            @else
                <div class="alert alert-danger" role="alert">
                    You must be an admin to create a task.
                </div>
            @endif
            <h4>3 task remains</h4>
            <table class="table table-responsive table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Is completed</th>
                    <th scope="col">Created by</th>
                    <th scope="col">Company</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        @if ((($task->user_id == Auth::user()->id) || (Auth::user()->role == 'admin') || ($task->company_id == Auth::user()->company_id)) && $task->completed == 0)
                        <tr>
                            <th scope="row">{{ $task->id }}</th>
                            <td>{{ $task->name }}</td>
                            <td>@if ($task->completed == 1)<i class="fas fa-check text-success"></i> @else <i class="fas fa-times text-danger"></i> @endif</td>
                            <td>{{ $task->user->email }}</td>
                            <td>@if ($task->company) {{ $task->company->name }} @else {{__('No company')}} @endif</td>
                            <td>
                                <!-- <button type="button" wire:click.prevent="edit({{ $task->id }})" class="btn btn-warning btn-sm">Update</button> -->
                                <button type="button" wire:click.prevent="delete({{ $task->id }})" class="btn text-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            <h4>Completed tasks</h4>
            <table class="table table-responsive table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Is completed</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        @if ((($task->user_id == Auth::user()->id) || (Auth::user()->role == 'admin') || ($task->company_id == Auth::user()->company_id)) && ($task->completed == 1))
                        <tr>
                            <th scope="row">{{ $task->id }}</th>
                            <td>{{ $task->name }}</td>
                            <td>@if ($task->completed == 1)<i class="fas fa-check text-success"></i> @else <i class="fas fa-times text-danger"></i> @endif</td>
                            <td>
                                <button type="button" wire:click.prevent="edit({{ $task->id }})" class="btn btn-warning btn-sm">Modifier</button>
                                <button type="button" wire:click.prevent="delete({{ $task->id }})" class="btn btn-danger btn-sm">Supprimer</button>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        @endguest
    </div>
</div>
