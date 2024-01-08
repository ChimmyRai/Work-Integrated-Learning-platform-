<?php

namespace App\Http\Controllers;
use App\Models\StudentProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StudentProfileCreateUpdateValidation;

class StudentProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = User::where('userType', 'student')->paginate(5);
        return view('showallstudentslist', [
            'students' =>  $students ,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('StudentCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentProfileCreateUpdateValidation $request)
    {
       
        $profile = new StudentProfile();
        $profile->user_id =$request->input('user_id');
        $profile->GPA=$request->input('GPA');
       
        // Convert the array to a comma-separated string
        $arrayAsString = implode(',', $request->input('roles'));
        $profile->Roles= $arrayAsString;
       
        if($profile->save()){

            session()->flash('success', "Profile information Added successfully");
        }
        else{

            session()->flash('error', "Profile information couldnt be added");
        }

        return redirect()->route('StudentProfileCreateForm');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student=User::find($id);
        $studentProfile=$student->studentprofile;

            //check if the student havent update his/her GPA and Roles profile information
            if (empty($studentProfile)) {
                    $rolesArray = '';
                }else{
                    $rolesArray = explode(',', $studentProfile->Roles);//change back roles from string to array 

                }
                
        
        return view('showstudentdetails', [
            'student' => $student,
            'studentProfile'=> $studentProfile,
            'rolesArray' => $rolesArray,
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
    public function update(StudentProfileCreateUpdateValidation $request,$id)
    {
        $studentProfile = StudentProfile::where('user_id',$id)->first();
        
        $studentProfile->GPA=$request->GPA;
        
        // Convert the array to a comma-separated string
        $arrayAsString = implode(',', $request->input('roles'));
        $studentProfile->Roles= $arrayAsString;

        if($studentProfile->save()){

            session()->flash('success', "Profile information Updated successfully");
        }
        else{

            session()->flash('error', "Profile information couldnt be updated");
        }

        return redirect()->route('StudentUpdate',$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
