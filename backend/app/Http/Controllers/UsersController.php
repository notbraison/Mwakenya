<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;


class UsersController extends Controller
{
    //
    function createUser(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'age' => 'required',
            'usertype' => 'required|in:student,teacher,admin',
            'grade' => '',
            'gender' => '',
            
        ]);
        $users = Users::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password'=>$request->password,
            'age'=>$request->age,
            'usertype'=>$request->usertype

        ]);

        $usersCheck = Users::find($users->id);

        if($usersCheck){
            return response()->json($usersCheck);
        }
        else{
            return response("User creation unsuccessful");
        }
    }

    function readAllUsers(){
        $user = Users::all();
        
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

        $user = Users::find($request->id);

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
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8', 
        ]);
    
        // Find the user by email
        $user = Users::where('email', $request->email)->first();
    
        if ($user) {
            // Update the user's password
            $user->password = bcrypt($request->password); // Ensure to hash the password
    
            $user->save();
    
            return response()->json(['message' => 'Password updated successfully']);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }

    function deleteUser(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $user = Users::find($request->id);

        if($user){
            $deletedUser = $user;

            $user->delete();
            return response()->json($deletedUser,"User has been deleted");
        }
        else{
            return response("Delete unsuccessful, no such user exits");
        }
    }

}
