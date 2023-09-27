<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public $loginAfterSingUp = true;

    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // $token = auth()->login($user);
        $token = auth('api')->tokenById($user->id);
        return $this->respondWithToken($token);
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // if (auth()->attempt($credentials)) {
        //     $token = auth()->login($user);
        //     return $this->respondWithToken($token);
        // }
        // return response()->json(['error' => 'Unauthorized'], 401);
        if(!$token = auth()->attempt($credentials)){
            return response()->json(['error' => 'Unauthorized'], 401);
        }else{
            // return response()->json(['msg' => 'Sucessso']);
            return $this->respondWithToken($token);
        }
        return $this->respondWithToken($token);
    }


    public function getAuthUser(Request $request){
        return response()->json(auth()->user());
    }


    public function logout(){
        auth()->logout();
        return response()->json(['message' => 'Logged out sucess']);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

}
