<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\StudentProfile;
use App\Models\User;
use App\Models\ProjectApplication;
use App\Rules\CheckUserApplication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
   
    /**
     * Show the form for creating a new resource.
     */
    public function create($project_id)
    {
        $project= $project=Project::find($project_id);
        
        return view('ApplicationCreate',['project'=>$project]);
    }

    /**
     * Store and save the student application 
     */
    public function store(Request $request){

        $request->validate([
            'project_id'=> ['required', new CheckUserApplication],
            'justification'=>['required','regex:/(\w+\s+){2}\w+/']
            // other validation rules for your form fields
        ]);
       
        $application = new ProjectApplication();
        $application->user_id =Auth::id();
        $application->project_id =$request->input('project_id');
        $application->justification =$request->input('justification');
        if($application->save()){

            session()->flash('success', "Application successfull");
        }
        else{

            session()->flash('error', "soemthing wrong in happened in submitting the application");
        }

        return redirect()->route('ApplicationCreateForm',['id' => $application->project_id ]);
    }


    //assign projects and roles to students based on thier application

    public function assign(){

       dd("here goes the project applicaiton logic");
      $projects = Project::whereHas('projectApplications')->get();
      


      foreach ($projects as $project) {
        // Get project applications for this project
        $projectApplications = $project->projectApplications;

        // Applicants
       $applicants = [];

        
        foreach ($projectApplications as $application) {

        }

    }


















    }
}
