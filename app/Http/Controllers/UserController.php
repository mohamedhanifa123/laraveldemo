<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class UserController extends Controller
{
    public function login(Request $request){

        if(Auth::attempt(['email' => request('email'), 'password' =>request('password')]))
        {
            $user=Auth::user();
            $data['token'] = $user->createToken('MyApp')->accesstoken;
            return response()->json([
                'status' => true,
                'data'   =>$data,
                'message'=> ''
            ]);
        }
        else{
            return response()->json([
                'status' => false,
                'data'   =>[],
                'message'=>'email id or password is invalid'
            ]);
        }
       
       
    }

    public function register(Request $request)
    {
        $user  =new user;
        $user->name = $request->name;
        $user->email =$request->email;
        $user->password=Hash::make($request->password);
        if($user->save())
        {
            return response()->json([
                'state' =>true,
                'data'  =>[],
                'message'=>'User register Successfully'
            ]);
        }else{
            return response()->json([
                'state' =>False,
                'data'  =>[],
                'message'=>'User registeration failed'
            ]);
        }
    }
    public function getAllUsers(){

        $user=user::all();
        if(count($users)>0) {
            return response()->json([
                'status'=>'true',
                'data' =>$users,
                'message'=>''
            ]);
        }else{
            return response()->json([
                'status'=>'false',
                'data' =>[],
                'message'=>'No Users Found'
            ]);
        }
    }

    public function User(){

         return User::all();
    }
}
