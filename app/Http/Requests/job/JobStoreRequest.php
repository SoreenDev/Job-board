<?php

namespace App\Http\Requests\job;

use App\Models\Job;
use Illuminate\Foundation\Http\FormRequest;

class JobStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255', 'min:3'],
            'description' => ['required' , 'string' , 'min:15'],
            'salary' => ['required', 'numeric' , 'min:5000', 'max:10000000'],
            'location' => ['required' , 'string' , 'min:3' , 'max:255'],
            'category' => ['required', 'in: '.implode(',' ,Job::$category)],
            'experience' => ['required','in: '.implode(',' ,Job::$experience)]
        ];
    }
}
