<?php

namespace App\Http\Requests\Event;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Enums\EventStatus;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_date' => 'required|date|after_or_equal:start_date',
            'end_time' => 'required|date_format:H:i',
            'time_zone' => 'required|string|max:100',
            'status' => ['required', Rule::in(EventStatus::options())],
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'title.required' => 'The event title is required.',
            'start_date.required' => 'The start date is required.',
            'start_time.required' => 'The start time is required.',
            'end_date.required' => 'The end date is required.',
            'end_time.required' => 'The end time is required.',
            'time_zone.required' => 'The time zone is required.',
            'status.required' => 'The status is required.',
        ];
    }

}
