<?php

namespace App\Http\Requests;
use App\Models\StudentProfile;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule; 
class StudentProfileCreateUpdateValidation extends FormRequest
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
            $rules = [
                'roles' => ['required', 'array'],
                'GPA' => ['required', 'numeric', 'between:0,7'],
            ];

            // Apply unique rule only for creating (when no ID is provided in the request)
            if ($this->isMethod('post')) {
                $rules['user_id'] = ['required', 'numeric', Rule::unique(StudentProfile::class)];
            }

            return $rules;
    }
    public function messages(): array
    {
        return [
            'user_id.unique' => 'It seems the user has already added profile information before.To update, go to profile update link',
        ];
    }
    
}
