<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    //
    function createSubject(Request $request){
        $request->validate([
            'subject_name' => 'required',
        ]);

        $Subject = Subject::create([
            'subject_name' => $request->Subject,            

        ]);

        $SubjectsCheck = Subject::find($Subject->id);

        if($SubjectsCheck){
            return response()->json($SubjectsCheck);
        }
        else{
            return response("Subject creation unsuccessful");
        }
    }

    function readAllSubjects(){
        $Subject = Subject::all()->pluck('subject_name');
        
        if($Subject){
            return response()->json($Subject);
        }
        else{
            return response("No Subject found");
        }
    }

    function readSubject(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $Subject = Subject::find($request->id);

        if($Subject){         // return response()->json($Subject);
            return response()->json(['Subject'=>$Subject->Subject]);
        }
        else{
            return response("No such Subject exists");
        }
    }

    function updateSubject(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $Subject = Subject::find($request->id);

        if($Subject){
            $Subject->name = $request->name;

            $Subject->save();
            return response()->json($Subject
);
        }
        else{
            return response("Update unsuccessful, no such Subject exists");
        }
    }

    function deleteSubject(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $Subject= Subject::find($request->id);

        if($Subject){
            $deletedSubject= $Subject;

            $Subject->delete();
            return response()->json($deletedSubject);
        }
        else{
            return response("Delete unsuccessful, no such Subject exits");
        }
    }
}
