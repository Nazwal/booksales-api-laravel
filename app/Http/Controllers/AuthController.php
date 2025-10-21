<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request){
        // setup validator
        $validator = Validator::make($request->all(),[
            'name'=>'required|string|max:255',
            'email'=>'required|email|max:255|unique:users',
            'password'=>'required|min:8',
        ]);
        //cek validator
        if ($validator->fails()){
            return response()->json($validator->errors(),422);
        }
        //create user
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);
        //isSuccess
        if ($user) {
            return response()->json([
                'succes'=>true,
                'message'=>'user created succesfully',
                'data'=>$user
            ],201);
        }
        //isNotsucces
        return response()->json([
        'succes'=>false,
        'message'=>'user created failed',
        ],409);//conflict
        
    }

    public function login(Request $request) {
        // setup validator
        $validator = Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        //cek validator
        if ($validator->fails()){
            return response()->json($validator->errors(),422);
        }
        //get kredensial dari request
        $credentials = $request->only('email','password');
        //cek is failed
        if (!$token = auth()->guard('api')->attempt($credentials)){
            return response()->json([
                'success'=>false,
                'message'=>'email atau password anda salah!'

            ],401);
        }
        // cek is succes
        return response()->json([
            'success'=>true,
            'message'=>'login successfully',
            'user'=>auth()->guard('api')->user(),
            'token'=>$token,
        ],200);
    }

    public function logout( Request $request){
        //try catch
        //1.invalidate token
        //2.cek is succes

        //catch
        //1.cek isfailed
        try {
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json([
        'success'=>true,
        'message'=>'logout succesfully'
        ],200);
        }catch (JWTException $e){
        return response()->json([
            'success'=>false,
            'message'=>'logout failed'  
        ],500);
        }
    }
        
}
