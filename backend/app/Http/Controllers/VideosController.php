<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Videos;

class VideosController extends Controller
{
    //
    function createvideo(Request $request){
        $request->validate([
            'name' => 'required',
            'video' => 'required|file|mimes:mp4,avi,flv', // Validate video file type
            'grade' => 'required',
            'subject' => 'required',
            'topic' => 'required',
        ]);
        $videoPath = $request->file('video')->store('videos', 'public');

        $videos = Videos::create([
            'name' => $request->name,
            'video_path' => $videoPath, // Store the file path in the database
            'grade'=>$request->grade,
            'subject'=>$request->subject,
            'topic'=>$request->topic
        ]);

        $videosCheck = Videos::find($videos->id);

        if($videosCheck){
            return response()->json($videosCheck);
        }
        else{
            return response("video creation unsuccessful",500);
        }
    }

    function readAllvideos(){
        $video = Videos::all();
        
        if($video){
            return response()->json($video);
        }
        else{
            return response("No video found");
        }
    }

    function readvideo(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $video = Videos::find($request->id);

        if($video){
            // return response()->json($video);
            return response()->json(['email'=>$video->email]);
        }
        else{
            return response("No such video exists");
        }
    }

    function updatevideo(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $video = Videos::find($request->id);

        if($video){
            $video->name = $request->name;

            $video->save();
            return response()->json($video);
        }
        else{
            return response("Update unsuccessful, no such video exists");
        }
    }

    function deletevideo(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $video = Videos::find($request->id);

        if($video){
            $deletedvideo = $video;

            $video->delete();
            return response()->json($deletedvideo);
        }
        else{
            return response("Delete unsuccessful, no such video exits");
        }
    }

}
