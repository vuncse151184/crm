<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UserInfo;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function get_user_info(){

        if(auth()->check()){ //
            $userinfo= userinfo::find(Auth::id());
            $age = $userinfo->age;
            $address = $userinfo->address;
            $phone = $userinfo->phone;
            echo('age:'.$age);
            echo('phone:'.$phone);
            echo('address:'.$address);
            return view('auth.dashboard', compact('userinfo'));
           // auth()->user()->userinfo()->age;

        }else{
            return redirect()->route('login');
        }
    }




}
