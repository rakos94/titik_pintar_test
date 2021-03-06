<?php

namespace App\Http\Controllers;

use App\Repositories\StateRepository;
use App\Repositories\TaskRepository;
use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $service;
    
    public function __construct(TaskRepository $taskRepository, StateRepository $stateRepository)
    {
        // set the service
        $this->service = new TaskService($taskRepository, $stateRepository);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->service->getAllTask();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $section_id)
    {
        $request->merge(['section_id' => $section_id]);
        return $this->service->createTask($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->service->getOneTask($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->service->updateTask($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->service->deleteOneTask($id);
    }
    
    public function changeStateToDone($section_id, $id)
    {
        return $this->service->updateTaskStateDone($id);
    }
    
    public function changeStateToTodo($section_id, $id)
    {
        return $this->service->updateTaskStateTodo($id);
    }
}
