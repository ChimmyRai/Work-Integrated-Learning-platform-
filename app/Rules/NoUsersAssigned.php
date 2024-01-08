<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\ProjectApplication;

class NoUsersAssigned implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $projectId = request()->input('project_id');
       // Check if the user has already applied for this project
       $existingApplication = ProjectApplication::where('project_id', $projectId)->count()>0;
       if ($existingApplication) {
                $fail('The project cannot be deleted cause students have applied for the project');
        }                                
                                                
    }
}
