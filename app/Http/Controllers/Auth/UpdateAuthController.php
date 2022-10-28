<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UpdateAuthController extends Controller
{


    public function update_user_info(Request $request,$id){
        if(auth()->check()){
            $update = UserInfo::find($request->id());
            $update->age = $request->age;
            $update->address = $request->address;
            $update->phone = $request->phone;
            $update ->save();
            return view('page.dashboard'.compact('message',"successful"));
        }
        else{
            return view('login');
        }

    }

}
