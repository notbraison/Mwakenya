<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answers;
class AnswersController extends Controller
{
    //
    function createanswer(Request $request){
        $request->validate([
            'answer' => 'required|string',
            'questionid' => 'required|exists:questions,id', // Ensure the question exists
        ]);
        $answer = Answers::create([
            'answerText' => $request->answer,
            'questionid' => $request->questionid, // Associate the answer with a question
        ]);

        $answerCheck = Answers::find($answer->id);

        if($answerCheck){
            return response()->json($answerCheck);
        }
        else{
            return response("answer creation unsuccessful",500);
        }
    }

    function readAllanswers(){
        $answer = Answers::all();
        
        if($answer){
            return response()->json($answer);
        }
        else{
            return response("No answer found");
        }
    }

    function readanswer(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $answer = Answers::find($request->id);

        if($answer){
            // return response()->json($answer);
            return response()->json(['email'=>$answer->email]);
        }
        else{
            return response("No such answer exists");
        }
    }

    function updateanswer(Request $request){
        $request->validate([
            'id' => 'required'
        ]);
    
        $answer = Answers::find($request->id);
    
        if($answer){
            $answer->title = $request->title; // Update the 'title' field, not 'name'
    
            $answer->save();
            return response()->json($answer);
        }
        else{
            return response("Update unsuccessful, no such book exists");
        }
    }

    function deleteanswer(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $answer = Answers::find($request->id);

        if($answer){
            $deletedanswer = $answer;

            $answer->delete();
            return response()->json($deletedanswer);
        }
        else{
            return response("Delete unsuccessful, no such answer exits");
        }
    }
}
