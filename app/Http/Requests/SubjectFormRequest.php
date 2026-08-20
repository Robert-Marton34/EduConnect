<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectFormRequest extends FormRequest
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
            "name" => "required|string|min:3",
            "description" => "nullable|string",
            "subject_code" => [
                "required",
                "regex:/^IK-[A-Z]{3}[0-9]{3}$/"
            ],
            "credit" => "required|numeric",
        ];
    }
}
