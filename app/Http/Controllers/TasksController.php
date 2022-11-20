<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Task $task)
    {
        return $task->get();
    }


    /**
     * Display a finished tasks.
     *
     * @return \Illuminate\Http\Response
     */
    public function finished(Task $task)
    {
        return $task->finished()->get();
    }

    /**
     * Display a finished tasks.
     *
     * @return \Illuminate\Http\Response
     */
    public function active(Task $task)
    {
        return $task->active()->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(TaskRequest $request, Task $task)
    {
        $created = $task->create($request->all());
        return ['message'=>'Task has been created successfully', 'data' => $created];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return $task;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, Task $task)
    {
        $updated = $task->update($request->all());
        return ['message'=>'Task has been updated successfully', 'data' => $updated];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function finish(Task $task)
    {
        $finished = $task->update(['status' => 'finished']);
        return ['message'=>'Task has been finished successfully', 'data' => $finished];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return ['message'=>'Task has been removed successfully', 'data' => $task];
    }
}
