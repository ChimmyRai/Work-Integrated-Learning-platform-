<?php

namespace App\Rules;
use App\Models\ProjectApplication;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckUserApplication implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Get user_id and project_id from the request data
        $userId =Auth::id();
        $projectId = request()->input('project_id');

        // Check if the user has already applied for this project
        $existingApplication = ProjectApplication::where('user_id', $userId)
                                         ->where('project_id', $projectId)
                                         ->exists();

        // Check if the user has reached the maximum application limit (3 applications)
        $applicationCount = ProjectApplication::where('user_id', $userId)->count();

       

        if ( $existingApplication|| $applicationCount >= 3) {
            $fail('The user has already applied to the project or the user has surpassed the application limit of 3');
        }
    }

    
}

