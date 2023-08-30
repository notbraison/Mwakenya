<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    //
    function createUser(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $users = User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password'=>$request->password
        ]);

        $usersCheck = User::find($users->id);

        if($usersCheck){
            return response()->json($usersCheck);
        }
        else{
            return response("User creation unsuccessful");
        }
    }

    function readAllUsers(){
        $user = User::all();
        
        if($user){
            return response()->json($user);
        }
        else{
            return response("No user found");
        }
    }

    function readUser(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $user = User::find($request->id);

        if($user){
            // return response()->json($user);
            return response()->json(['email'=>$user->email]);
        }
        else{
            return response("No such user exists");
        }
    }

    function updateUser(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $user = User::find($request->id);

        if($user){
            $user->name = $request->name;

            $user->save();
            return response()->json($user);
        }
        else{
            return response("Update unsuccessful, no such user exists");
        }
    }

    function deleteUser(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $user = User::find($request->id);

        if($user){
            $deletedUser = $user;

            $user->delete();
            return response()->json($deletedUser);
        }
        else{
            return response("Delete unsuccessful, no such user exits");
        }
    }

}
