<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {

        return TaskResource::collection(Task::with('priority')->get());
    }

    public function show(Task $task)
    {
        return TaskResource::make($task);
    }

    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->validated());
        $task->load('priority');
        return TaskResource::make($task);
    }

    public function update(Task $task , UpdateTaskRequest $request)
    {
        $task->update($request->validated());
        return TaskResource::make($task);
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return response()->noContent();
    }
}
