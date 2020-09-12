<?php namespace App\Repositories;

use App\Models\Section;

class SectionRepository extends Repository
{
    protected $model;
    
    public function __construct(Section $section)
    {
        // set the model section
        $this->model = $section;
    }

    public function getOneByName($value)
    {
        $this->model = $this->model->whereName($value)->first();
        return $this->model;
    }

}