<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questions;

class QuestionsController extends Controller
{
    //
    function createquestion(Request $request){
        $request->validate([
            'question' => 'required|string',
            'grade' => 'required|string',
            'subject' => 'required|string'
        ]);
        $question = Questions::create([
            'questionText' => $request->question,
            'grade'=>$request->grade,
            'subject'=>$request->subject
        ]);

        $questionCheck = Questions::find($question->id);

        if($questionCheck){
            return response()->json($questionCheck);
        }
        else{
            return response("question creation unsuccessful",500);
        }
    }

    function readAllquestions(){
        $question = Questions::all();
        
        if($question){
            return response()->json($question);
        }
        else{
            return response("No question found");
        }
    }

    function readquestion(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $question = Questions::find($request->id);

        if($question){
            // return response()->json($question);
            return response()->json(['email'=>$question->email]);
        }
        else{
            return response("No such question exists");
        }
    }

    function updatequestion(Request $request){
        $request->validate([
            'id' => 'required'
        ]);
    
        $question = Questions::find($request->id);
    
        if($question){
            $question->title = $request->title; // Update the 'title' field, not 'name'
    
            $question->save();
            return response()->json($question);
        }
        else{
            return response("Update unsuccessful, no such book exists");
        }
    }

    function deletequestion(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $question = Questions::find($request->id);

        if($question){
            $deletedquestion = $question;

            $question->delete();
            return response()->json($deletedquestion);
        }
        else{
            return response("Delete unsuccessful, no such question exits");
        }
    }
}
