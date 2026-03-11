<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\TaskRequest;
use App\Http\Services\TaskService;
class TaskController extends Controller
{
    public function __construct(protected TaskService $service) {}
    public function index(): JsonResponse
    {
        // функция получения тасков
        return response()->json($this->service->getPaginatedTasks());
    }

    public function store(TaskRequest $request): JsonResponse
    {
        // функция создания таска
        $product = $this->service->createTask($request->validated());
        return response()->json($product, 201);
    }

    public function show(Task $task) {}

    public function update(TaskRequest $request, Task $task): JsonResponse
    {
        // функция обновление таска
        $updatedTask = $this->service->updateTask($task, $request->validated());
        return response()->json($updatedTask);
    }

    public function destroy(Task $task): JsonResponse
    {
        // функция удаления таска
        $this->service->deleteTask($task);
        return response()->json(null, 204);
    }
}
