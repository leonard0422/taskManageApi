<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use App\Repositories\TaskRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class TaskController extends ControllerApi
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = $this->taskRepository->getAllTasks();
        return new TaskCollection($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $validatedData = $request->validated();
        $task = $this->taskRepository->createTask($validatedData);
        return response()->json(new TaskResource($task), 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, string $id)
    {
        try {
            $task = $this->taskRepository->findTaskById($id);

            $validatedData = $request->validated();
            $updatedTask = $this->taskRepository->updateTask($task, $validatedData);
            return response()->json(new TaskResource($updatedTask), 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Tarea no encontrada',
                'message' => $e->getMessage(),
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $task = $this->taskRepository->findTaskById($id);

            $this->taskRepository->deleteTask($task);
            return response()->json(['message' => 'Eliminado exitosamente'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Tarea no encontrada',
                'message' => $e->getMessage(),
            ], 404);
        }

    }
}
