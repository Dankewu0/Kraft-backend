<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:4', 'max:255'],
            'status_id' => ['nullable', 'integer', 'exists:statuses,id'],
            'priority_id' => ['nullable', 'integer', 'exists:priorities,id'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Task name is required.',
            'name.string' => 'Task name must be a string.',
            'name.min' => 'Task name must be at least :min characters.',
            'name.max' => 'Task name must be at most :max characters.',
            'status_id.integer' => 'Status must be a valid ID.',
            'status_id.exists' => 'Status must exist.',
            'priority_id.integer' => 'Priority must be a valid ID.',
            'priority_id.exists' => 'Priority must exist.',
        ];
    }
}
