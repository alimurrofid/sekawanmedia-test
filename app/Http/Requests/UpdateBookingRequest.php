<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookingRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'vehicle_id' => 'required|exists:vehicles,id',
            'driver_id' => 'required|exists:drivers,id',
            'approved_by_level_1' => 'required|exists:users,id',
            'approved_by_level_2' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'purpose' => 'required|string|max:255',
            'start_odometer' => 'required|integer',
            'end_odometer' => 'nullable|integer',
            'fuel_consumed' => 'nullable|numeric',
            'note' => 'nullable|string|max:255',
        ];
    }
}
