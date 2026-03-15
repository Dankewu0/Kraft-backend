<?php

namespace App\Http\Services;

use App\Models\Priority;
use Illuminate\Database\Eloquent\Collection;

class PriorityService
{
    public function getAllPriorities(): Collection
    {
        return Priority::all();
    }

    public function createPriority(array $data): Priority
    {
        return Priority::create($data);
    }

    public function updatePriority(Priority $priority, array $data): Priority
    {
        $priority->update($data);

        return $priority;
    }

    public function deletePriority(Priority $priority): void
    {
        $priority->delete();
    }
}
