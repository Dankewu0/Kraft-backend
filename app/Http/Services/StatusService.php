<?php

namespace App\Http\Services;

use App\Models\Status;
use Illuminate\Database\Eloquent\Collection;

class StatusService
{
    public function getAllStatuses(): Collection
    {
        return Status::all();
    }

    public function createStatus(array $data): Status
    {
        return Status::create($data);
    }

    public function updateStatus(Status $status, array $data): Status
    {
        $status->update($data);

        return $status;
    }

    public function deleteStatus(Status $status): bool
    {
        return $status->delete();
    }
}
