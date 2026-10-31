<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Nette\Schema\Message;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request) {
        // 1. setup validator
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password'=> 'required|min:8'
        ]);

        // 2. check validator
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }


        // 3. create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);


        // 4. cek keberhasilan
        if ($user) {
            return response()->json([
                'success' => true,
                'Message' => 'User created successfuly!',
                'data' => $user
            ], 201);
        }


        // 5. cek kegagalan
        return response()->json([
            'success' => false,
            'message' => 'User creation faild'
        ], 409); //Conflict 
    }

    public function login(Request $request) {
        // 1. setup validator
        $validator = Validator::make($request->all(),[
            'email'=> 'required|email',
            'password' => 'required'
        ]);
        // 2. cek validator
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        // 3. get kredensial dari request
        $credentials = $request->only('email', 'password');

        // 4. cek kegagalan
        if (!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Your email or password is incorrect!'
            ], 401);
        }
        // 5. cek keberhasilan
        return response()->json([
            'success' => true,
            'message' => 'Login Successfuly!',
            'user' => auth()->guard('api')->user(),
            'token'=> $token,
        ], 200);
    }

    public function logout(Request $request) {
        // try catch
        // 1. Invalidate token
        // 2. cek keberhasilan

        // catch
        // 1. cek kegagalan

        try {
            JWTAuth::invalidate(JWTAuth::getToken());

            return response()->json([
                'success' => true,
                'message' => 'Logout Successfully!'
            ], 200);
        } catch (JWTException $e) {
            return response()->json([
                'success'=> false,
                'message' => 'Logout Failed'
            ], 500);
        }
    }
}
