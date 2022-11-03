<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Constracts\IUserAuthen as IAuth;

abstract class BaseController extends Controller implements IAuth{
    function login(Request $request){

    }

    function register(Request $request):\Illuminate\Http\RedirectResponse
    {
        return redirect()->route('login');
    }

    function logout():\Illuminate\Http\RedirectResponse
    {
        return redirect()->route('login');
    }
}
