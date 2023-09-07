<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;

class GradeController extends Controller
{
    //
    function createGrade(Request $request){
        $request->validate([
            'grade' => 'required',
            
        ]);

        $Grades = Grade::create([
            'grade' => $request->grade,
        ]);

        $GradesCheck = Grade::find($Grades->id);

        if($GradesCheck){
            return response()->json($GradesCheck);
        }
        else{
            return response("Grade creation unsuccessful");
        }
    }

    function readAllGrades(){
        $Grade = Grade::all()->pluck('grade');
        
        if($Grade){
            return response()->json($Grade);
        }
        else{
            return response("No Grade found");
        }
    }

    function readGrade(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $Grade = Grade::find($request->id);

        if($Grade){
            // return response()->json($Grade);
            return response()->json(['grade'=>$Grade->grade]);
        }
        else{
            return response("No such Grade exists");
        }
    }

    function updateGrade(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $Grade = Grade::find($request->id);

        if($Grade){
            $Grade->name = $request->name;

            $Grade->save();
            return response()->json($Grade);
        }
        else{
            return response("Update unsuccessful, no such Grade exists");
        }
    }

    function deleteGrade(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $Grade = Grade::find($request->id);

        if($Grade){
            $deletedGrade = $Grade;

            $Grade->delete();
            return response()->json($deletedGrade);
        }
        else{
            return response("Delete unsuccessful, no such Grade exits");
        }
    }
}
