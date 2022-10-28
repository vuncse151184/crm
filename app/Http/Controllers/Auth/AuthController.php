<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\Response;
class AuthController extends Controller
{
    //
    public function login(Request $request){

        if($request->isMethod('post')){

            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                // Authentication passed...
                $nId = $request->id;
                return redirect()->route('dashboard');
            }
            else{
                $message= 'Wrong email or password';
                echo $message;
                return redirect()->route('login');
            }
        }


    }

    public function logout(){
        auth()->logout();
        return redirect()->route('login');
    }


    public function register(Request $request){
        $user= $request->all();
        $user['password']= bcrypt($user['password']);
        User::create($user);

        echo'Register successfull';
//        return redirect()->route('login');
    }
}
