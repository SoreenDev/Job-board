<?php

namespace App\Http\Requests\jobApplication;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreJobApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'expected_salary' => ['required', 'numeric' , 'min:1' , 'max:1000000'],
            'cv' => [ 'required' , 'mimes:pdf' , 'max:2048']
        ];
    }
}
