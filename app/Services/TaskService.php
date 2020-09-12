<?php

namespace App\Services;

use App\Models\State;
use App\Repositories\StateRepository;
use App\Repositories\TaskRepository;

class TaskService {
    
    protected $taskRepository;
    protected $stateRepository;
    
    public function __construct(TaskRepository $taskRepository, StateRepository $stateRepository)
    {
        $this->taskRepository = $taskRepository;
        $this->stateRepository = $stateRepository;
    }

    public function createTask(array $request){
        $baseState = $this->stateRepository->getOneByName(State::TODO);
        return $this->taskRepository->createTask($request, $baseState);
    }
    
    public function getAllTask(){
        return $this->taskRepository->all();
    }

    public function getOneTask($id){
        return $this->taskRepository->show($id);
    }
    
    public function updateTask(array $request, $id){
        return $this->taskRepository->update($request, $id);
    }

    public function deleteOneTask($id){
        return $this->taskRepository->delete($id);
    }

    public function updateTaskStateDone($id){
        $state = $this->stateRepository->getOneByName(State::DONE);
        return $this->taskRepository->updateTaskState($id, $state);
    }
    
    public function getFilterByState(array $request){
        return $this->taskRepository->getAllByState($request['state_id']);
    }

}