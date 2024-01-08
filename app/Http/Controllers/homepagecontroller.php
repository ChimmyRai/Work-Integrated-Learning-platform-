<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class homepagecontroller extends Controller
{
    public function index()
    {
        $partners = User::where('userType', 'inP')->paginate(5);
        return view('dashboard', [
            'partners' =>  $partners ,
        ]);
    }

    public function listPartnerProjects($id)
    {

        $user=User::find($id);
        // Check if the user exists
        if ($user) {
            // Check if the user has any projects
            if ($user->projects->count() <= 0) {
                // User has no projects
                session()->flash('error', "there is no projects advertised by the industry partner yet");
                return redirect()->route('dashboard');
              
            } else {
                return view('showProjectsList', [
                    'projectsofinp' =>  $user->projects ,
                    'user'=> $user,
                ]);
            }
        } else {
            // User not found
            dd('User not found.');
        }


    }

    //function to approve the inp so that they can create projects
    public function approve($id){

        $user=User::find($id);
         // Check if the user with the given ID exists
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Update the status field
        if($user->update(['status' => 'approved'])){

            session()->flash('success', "industry partner with id ".$id." has been approved");
        }
        else{

            session()->flash('error', "something went wrong with the approval process");
        }

        return redirect()->route('dashboard');


    }
}
