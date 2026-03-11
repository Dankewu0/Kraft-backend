<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use App\Http\Requests\PriorityRequest;
use App\Http\Services\PriorityService;
use Illuminate\Http\JsonResponse;
class PriorityController extends Controller
{
    public function __construct(protected PriorityService $service) {}
    public function index()
    {
        $priorities = $this->service->getAllPriorities();
        return response()->json($priorities, 200);
    }

    public function store(PriorityRequest $request)
    {
        $priority = $this->service->createPriority($request->validated());
        return response()->json($priority, 201);
    }

    public function show(Priority $priority) {}

    public function update(PriorityRequest $request, Priority $priority)
    {
        $priority = $this->service->updatePriority(
            $priority,
            $request->validated(),
        );
        return response()->json($priority, 200);
    }

    public function destroy(Priority $priority)
    {
        $this->service->deletePriority($priority);
        return response()->json(null, 204);
    }
}
