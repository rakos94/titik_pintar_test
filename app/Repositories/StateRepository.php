<?php namespace App\Repositories;

use App\Models\State;

class StateRepository extends Repository
{
    protected $model;
    
    public function __construct(State $state)
    {
        // set the model state
        $this->model = $state;
    }

    public function getOneByName($value)
    {
        $this->model = $this->model->whereName($value)->first();
        return $this->model;
    }

}