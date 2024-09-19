<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository
{
    // Encontrar una tarea por ID
    public function findTaskById($id)
    {
        return Task::findOrFail($id);
    }

    // Obtener todas las tareas
    public function getAllTasks()
    {
        return Task::orderBy('created_at', 'desc')->get();
    }

    // Crear una nueva tarea
    public function createTask(array $data)
    {
        return Task::create($data);
    }

    // Actualizar una tarea existente
    public function updateTask(Task $task, array $data)
    {
        $task->update($data);
        return $task;
    }

    // Eliminar una tarea
    public function deleteTask(Task $task)
    {
        $task->delete();
    }
}
