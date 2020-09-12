<?php

namespace App\Services;

use App\Repositories\SectionRepository;

class SectionService {
    
    protected $sectionRepository;
    
    public function __construct(SectionRepository $sectionRepository)
    {
        $this->sectionRepository = $sectionRepository;
    }

    public function createSection(array $request){
        return $this->sectionRepository->create($request);
    }
    
    public function getAllSection(){
        return $this->sectionRepository->all();
    }

    public function getOneSection($id){
        $this->sectionRepository->setModel($this->sectionRepository->show($id));
        $this->sectionRepository->load('tasks');
        return $this->sectionRepository->getModel();
    }
    
    public function updateSection(array $request, $id){
        return $this->sectionRepository->update($request, $id);
    }

    public function deleteOneSection($id){
        return $this->sectionRepository->delete($id);
    }

}