<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\Response;
class AuthController extends BaseController
{
    //
    public function login(Request $request){

            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                // Authentication passed...
                $nId = $request->id;
                return redirect()->route('product.view');
            }
            else{
                $message= 'Wrong email or password';
                printf($message);
                return redirect()->route('login');
            }



    }

    public function logout():\Illuminate\Http\RedirectResponse{
        auth()->logout();
        return redirect()->route('login');
    }


    public function register(Request $request):\Illuminate\Http\RedirectResponse
    {
        $user= $request->all();
        $user['password']= bcrypt($user['password']);
        User::create($user);
       return redirect()->route('login');
    }
}
