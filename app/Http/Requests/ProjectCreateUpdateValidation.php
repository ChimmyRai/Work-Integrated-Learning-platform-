<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule; 
use Illuminate\Foundation\Http\FormRequest;

class ProjectCreateUpdateValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
         return true;;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
           
            'email' => ['email', Rule::unique(User::class)->ignore($this->user()->id)],
            'description'=> ['required', 'regex:/(\w+\s+){2}\w+/'],
            'number_of_student'=>['required','numeric','between:3,6'],
            'year'=>['required','numeric','between:2022,2024'],
            'trimester'=>['required','numeric','between:1,3'],
        ];

        // If it's a create request, add file validation rules
        if ($this->isMethod('post')) {
            $rules['files'] = 'required|array|min:1';
            $rules['files.*'] = 'required|file|mimes:pdf,png,jpeg,jpg|max:2048';
             // check the title is not same for same year and trimester
             $rules['title'] = ['required','string', 'min:6',
             Rule::unique('projects')->where(function ($query) {
                 return $query->where('year', request('year'))
                             ->where('trimester', request('trimester'));
             }),
         
            ];
        }

        return $rules;
    }
}
