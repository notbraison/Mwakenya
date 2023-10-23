<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Videos;

class VideosController extends Controller
{
    //
    function createvideo(Request $request){
        try {
            $request->validate([
                'video' => 'required|file|mimetypes:video/mp4,avi,flv',
                'name' => 'required',
                'grade' => 'required',
                'subject' => 'required',
                'topic' => '',
            ]);
    
            $videoPath = $request->file('video')->store('videos', 'public');
    
            $videos = Videos::create($request->only(['name', 'grade', 'subject', 'topic']) + ['videopath' => $videoPath]);
    
            $videos = Videos::findOr($videos->id, function () {
                return response("Video not found", 404);
            });
    
            return response()->json($videos);
        } catch (\Exception $e) {
            return response("Video creation unsuccessful", 500);
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
