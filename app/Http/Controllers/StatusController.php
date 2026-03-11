<?php

namespace App\Http\Controllers;
use App\Models\Status;
use App\Http\Requests\StatusRequest;
use App\Http\Services\StatusService;
use Illuminate\Http\JsonResponse;
class StatusController extends Controller
{
    public function __construct(protected StatusService $service) {}
    public function index()
    {
        return $this->service->getAllStatuses();
    }

    public function store(StatusRequest $request): JsonResponse
    {
        $status = $this->service->createStatus($request->validated());
        return response()->json($status, 201);
    }

    public function show(Status $status) {}

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
