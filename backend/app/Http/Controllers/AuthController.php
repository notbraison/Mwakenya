<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function register(Request $request){
        //we call a register coz we cannot login without registering
        //request is payload
        //validate it, wrap it in field object 
        $fields = $request->validate([
            'name'=> 'required|string',//should be type string
            'email'=> 'required|string|unique:users,email',//email should be unique
            'password'=> 'required|string|confirmed'//confirm password field, error if the passwords don't match
        ]);

        $user = User::create([
            'name'=> $fields['name'],
            'email'=> $fields['email'],
            'password'=>bcrypt($fields['password'])//password is encrypted b4 stored in db
        ]);

        $token = $user->createToken('myAppToken')->plainTextToken;// var token uses created user to create a 
        //token using key provided here 'myAppToken'

        $response = [//basically a user has been successfully created
            'user'=> $user,
            'token'=>$token
        ];

        return response($response, 201);
    }

    
    public function login(Request $request){
        $fields = $request->validate([//what was received
            'email'=> 'required|string',
            'password'=> 'required|string'
        ]);

        //check if email exists
        $user = User::where('email', $fields['email'])->first();//first instance of email
        // dd($fields['password'],$user->password);
        //check password
        //if there is no such user or hash can't be verified return error message
        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response([
                'message'=> 'Bad Credentials'
            ], 401);
        }
//if user exists and hash is ok go ahead and create token
        $token = $user->createToken('myAppToken')->plainTextToken;

        $response = [
            'user'=> $user,
            'token'=>$token
        ];

        return response($response, 201);
    }

//logout  
//tokens are all deleted after logout is called
//tokens are not only used for authentication also for other security purposes
    public function logout(Request $request){
        auth()->user()->tokens()    ->delete();

        return [
            'message'=> 'Logged Out'
        ];
    }
}
