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
        return $this->sectionRepository->show($id);
    }
    
    public function updateSection(array $request, $id){
        return $this->sectionRepository->update($request, $id);
    }

    public function deleteOneSection($id){
        return $this->sectionRepository->delete($id);
    }

}