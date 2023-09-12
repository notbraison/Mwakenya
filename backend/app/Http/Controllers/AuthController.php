<?php

namespace App\Http\Controllers;


use App\Models\Users;
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
            'password'=> 'required|string|confirmed',//confirm password field, error if the passwords don't match
            'age' => 'required',
            'usertype' => 'required|in:student,teacher,parent',
            'grade' => '',
            'gender' => ''
        ]);
        $grade = $request->input('grade', 'N/A');
$gender = $request->input('gender', 'Not specified');

        $user = Users::create([
            'name'=> $fields['name'],
            'email'=> $fields['email'],
            'password'=>bcrypt($fields['password']),//password is encrypted b4 stored in db
            'age'=> $fields['age'],
            'usertype'=> $fields['usertype'],
            'grade' => $grade,
            'gender' => $gender,
        ]);

        $token = $user->createToken('myAppToken')->plainTextToken;// var token uses created user to create a 
        //token using key provided here 'myAppToken'

        $response = [//basically a user has been successfully created
            'user'=> $user,
            'token'=>$token
        ];

        return response(['message' => 'User has been created successfully', 'data' => $response], 201);

    }

    
    public function login(Request $request){
        $fields = $request->validate([//what was received
            'email'=> 'required',
            'password'=> 'required'
        ]);

        //check if email exists
        $user = Users::where('email', $fields['email'])->first();//first instance of email
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
    //'http://localhost:5173'

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
