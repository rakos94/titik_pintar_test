<?php namespace App\Repositories;

use App\Models\State;
use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;

class TaskRepository extends Repository
{
    protected $model;
    
    public function __construct(Task $task)
    {
        // set the model task
        $this->model = $task;
    }
    
    public function createTask(array $data, State $baseState)
    {
        if(!isset($data['state_id'])){
            $data['state_id'] = $baseState->id;
        }
        $this->model = $this->model->create($data);
        return $this->model;
    }
    
    public function updateTaskState($id, State $state)
    {
        $this->model = $this->model->find($id);
        $this->model->update(['state_id', $state->id]);
        return $this->model;
    }

    public function getAllByState($state)
    {
        $this->model = $this->model->whereHas('state', function (Builder $query) use ($state) {
            $query->where('state', '=', $state);
        })->get();
        return $this->model;
    }

}