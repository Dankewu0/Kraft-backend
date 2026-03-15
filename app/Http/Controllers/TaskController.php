<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Http\Services\TaskService;
use App\Models\Tasks;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    public function __construct(protected TaskService $service) {}

    public function index(): JsonResponse
    {
        $tasks = $this->service->getPaginatedTasks();

        return response()->json($tasks, 200);
    }

    public function store(TaskRequest $request): JsonResponse
    {
        $task = $this->service->createTask($request->validated());

        return response()->json($task, 201);
    }

    public function show(Tasks $task): JsonResponse
    {
        return response()->json($task, 200);
    }

    public function update(TaskRequest $request, Tasks $task): JsonResponse
    {
        $updatedTask = $this->service->updateTask($task, $request->validated());

        return response()->json($updatedTask, 200);
    }

    public function destroy(Tasks $task): JsonResponse
    {
        $this->service->deleteTask($task);

        return response()->json(null, 204);
    }
}
