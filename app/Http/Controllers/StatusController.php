<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusRequest;
use App\Http\Services\StatusService;
use App\Models\Status;
use Illuminate\Http\JsonResponse;

class StatusController extends Controller
{
    public function __construct(protected StatusService $service) {}

    public function index(): JsonResponse
    {
        $statuses = $this->service->getAllStatuses();

        return response()->json($statuses, 200);
    }

    public function store(StatusRequest $request): JsonResponse
    {
        $status = $this->service->createStatus($request->validated());

        return response()->json($status, 201);
    }

    public function show(Status $status): JsonResponse
    {
        return response()->json($status, 200);
    }

    public function update(StatusRequest $request, Status $status): JsonResponse
    {
        $updatedStatus = $this->service->updateStatus(
            $status,
            $request->validated(),
        );

        return response()->json($updatedStatus, 200);
    }

    public function destroy(Status $status): JsonResponse
    {
        $this->service->deleteStatus($status);

        return response()->json(null, 204);
    }
}
