<?php

namespace App\Http\Requests\Event;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EventUpdateRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|gt:0',
            'remarks' => 'required',
            'type' => ['required', Rule::in([ActionType::Add->value,ActionType::Subtract->value])],
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
            'user_id.required' => 'User id is required!',
            'amount.required' => 'Amount is required!',
            'rate.required' => 'Rate is required!',
            'remarks.required' => 'Remarks is required!',
            'type.required' => 'Type is required!',
        ];
    }

}
