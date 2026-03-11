<?php
namespace App\Http\Services;
use App\Models\Task;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
class TaskService
{
    public function getPaginatedTasks(int $perPage = 10): LengthAwarePaginator
    {
        return Task::with(["name", "status"])
            ->latest()
            ->paginate($perPage);
    }
    public function createTask(array $data): Task
    {
        return Task::create($data);
    }
    public function updateTask(Task $task, array $data): Task
    {
        $task->update($data);
        return $task;
    }
    public function deleteTask(Task $task): bool
    {
        return $task->delete();
    }
}
