<?php

namespace App\Http\Services;

use App\Models\Tasks;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TaskService
{
    public function getPaginatedTasks(int $perPage = 10): LengthAwarePaginator
    {
        return Tasks::query()
            ->with(['status', 'priority'])
            ->latest()
            ->paginate($perPage);
    }

    public function createTask(array $data): Tasks
    {
        return Tasks::create($data);
    }

    public function updateTask(Tasks $task, array $data): Tasks
    {
        $task->update($data);

        return $task;
    }

    public function deleteTask(Tasks $task): bool
    {
        return $task->delete();
    }
}
