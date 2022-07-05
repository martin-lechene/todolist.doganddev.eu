<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class TasksList extends Component
{
    public $tasks;
    public $state = [];

    public $updateMode = false;

    public function mount()
    {
        $this->tasks = Task::all();
    }

    private function resetInputFields(){
        $this->reset('state');
    }

    public function store()
    {
        $validator = Validator::make($this->state, [
            'name' => 'required',

        ])->validate();

        Task::create($this->state);

        $this->reset('state');
        $this->tasks = Task::all();
    }

    public function edit($id)
    {
        $this->updateMode = true;

        $task = Task::find($id);

        $this->state = [
            'id' => $task->id,
            'name' => $task->name,
            'completed' => $task->completed,
            'user_id' => Auth::user()->id,
            'company_id' => Auth::user()->company_id,
        ];
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->reset('state');
    }

    public function update()
    {
        $validator = Validator::make($this->state, [
            'name' => 'required',
        ])->validate();


        if ($this->state['id']) {
            $task = Task::find($this->state['id']);
            $task->update([
                'name' => $this->state['name'],
                'user_id' => Auth::user()->id,
                'company_id' => Auth::user()->company_id,
                'completed' => $this->state['completed'],
            ]);


            $this->updateMode = false;
            $this->reset('state');
            $this->tasks = Task::all();
        }
    }

    public function delete($id)
    {
        if($id){
            Task::where('id',$id)->delete();
            $this->tasks = Task::all();
        }
    }


    public function render()
    {
        return view('livewire.tasks-list');
    }
}
