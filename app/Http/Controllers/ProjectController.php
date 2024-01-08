<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\File;
use App\Models\Project;
use App\Models\ProjectApplication;
use Illuminate\Validation\Rule; 
use App\Rules\NoUsersAssigned;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProjectCreateUpdateValidation;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.Show all the projects in grupedby fashion
     */
    public function index()
    {
         // Retrieve all projects and group by 'year' and 'trimester' fields
         $projects = Project::orderByDesc('year')
                            ->orderByDesc('trimester')
                            ->get()
                            ->groupBy(['year', 'trimester']);
        
         // Pass the grouped projects data to the Blade view
         return view('showallprojectslist', ['projects' =>  $projects]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ProjectCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectCreateUpdateValidation $request)
    {
    //    dd("validation passed");
        $project = new Project();
        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $project->number_of_student =$request->input('number_of_student');
        $project->year = $request->input('year');
        $project->trimester =$request->input('trimester');

        $project->save(); // Save the project to the projects table
         // Get the currently authenticated user
        $user = Auth::user();
        // Attach the user to the project in the pivot table
        $user->projects()->attach($project->id);

       
        $files = [];
        foreach ($request->file('files') as $key => $file) {
            $file_name = time() . rand(1, 99) . '.' . $file->extension();
            $file->move(public_path('uploads'), $file_name);
            $files[] = [
                'file_path' => $file_name,
                'project_id' => $project->id,
            ];
    }

    File::insert($files);

        session()->flash('success', "Project Created successfully");
             
        $partners = User::where('userType', 'inP')->get();
        return redirect()->route('ProjectCreateForm');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $project=Project::find($id);
        $creator= $project->users()->first();
       // $creator= $project->users()->wherePivot('role', 'creator')->first();
        $files = $project->files;
        // Get all applicants for the specific project ID
        $applicants =$project->projectApplications;
     
      
        return view('showprojectdetails', [
            'project' => $project,
            'creator'=> $creator,
            'files'=> $files,
            'applicants' => $applicants,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectCreateUpdateValidation $request,$id)
    {
        $project = Project::findOrFail($id);
        $creator=$project->users()->first();
        
      
             // Check if new files are uploaded
    if (request()->hasFile('files')) {
       
        // Delete existing files associated with the project
        foreach ($project->files as $file) {
           
            Storage::delete('uploads/' . $file->file_path);
            $file->delete();
           
        }
        // Handle new file uploads
        $files = [];
        foreach ($request->file('files') as $key => $file) {
           
            $file_name = time() . rand(1, 99) . '.' . $file->extension();
            $file->move(public_path('uploads'), $file_name);
            $files[] = [
                'file_path' => $file_name,
                'project_id' => $project->id,
            ];
        }
       

        // Save the new files
        File::insert($files);
        //update the project details
        $project->update([
            'title' =>$request->input('title'),
            //'email' => $request->input('email'),
            // 'inP_name'=> ['required','string', 'min:6'],
            'description'=> $request->input('description'),
            'number_of_student'=>$request->input('number_of_student'),
            'trimester'=> $request->input('trimester'),
            'year'=>$request->input('year'),
            ]);

        
    } else {
        // If no new files are uploaded, update only other project data
        $project->update([
            'title' =>$request->input('title'),
            //'email' => $request->input('email'),
            // 'inP_name'=> ['required','string', 'min:6'],
            'description'=> $request->input('description'),
            'number_of_student'=>$request->input('number_of_student'),
            'trimester'=> $request->input('trimester'),
            'year'=>$request->input('year'),
            ]);
    }

             $files = $project->files;
            session()->flash('success', "Update successfull");
            
            return redirect()->route('ProjectDetail',$id);
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        
        // Validate the request
        request()->validate([
            'project_id' => ['required', new NoUsersAssigned($request->project_id)],
        ]);

      
        //Find the project by ID
         $project = Project::find($request->project_id);

            // Check if the project exists
            if ($project) {
                // Delete the project
                $project->users()->detach();
                $project->delete();
                session()->flash('success', "Project deleted successfully");
            
            } else {
                // If the project does not exist, redirect back with an error message
                session()->flash('error', "Something wrong with the deletion");
            }

            return redirect()->route('dashboard');
    }

 /**
     * Remove the specified resource from storage.
     */



}
