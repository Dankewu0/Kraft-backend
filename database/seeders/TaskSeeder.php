<?php

namespace Database\Seeders;

use App\Models\Priority;
use App\Models\Status;
use App\Models\Tasks;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statusTodo = Status::query()->firstOrCreate(['name' => 'Todo']);
        $statusInProgress = Status::query()->firstOrCreate(['name' => 'In Progress']);
        $statusDone = Status::query()->firstOrCreate(['name' => 'Done']);

        $priorityLow = Priority::query()->firstOrCreate(['name' => 'Low']);
        $priorityMedium = Priority::query()->firstOrCreate(['name' => 'Medium']);
        $priorityHigh = Priority::query()->firstOrCreate(['name' => 'High']);

        Tasks::query()->firstOrCreate(
            ['name' => 'First task'],
            [
                'status_id' => $statusTodo->id,
                'priority_id' => $priorityMedium->id,
            ]
        );

        Tasks::query()->firstOrCreate(
            ['name' => 'Second task'],
            [
                'status_id' => $statusInProgress->id,
                'priority_id' => $priorityHigh->id,
            ]
        );

        Tasks::query()->firstOrCreate(
            ['name' => 'Third task'],
            [
                'status_id' => $statusDone->id,
                'priority_id' => $priorityLow->id,
            ]
        );
    }
}
