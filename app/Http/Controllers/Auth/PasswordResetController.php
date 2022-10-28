<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PasswordResetController extends Controller
{
    public function sent_mail(Request $request){

        $cer = $request->validate(['email'=>'required|email']);
        //echo('wait for a min');
        $status= Password::sendResetLink(
            $cer
        );

       // dd(Password::RESET_LINK_SENT);

        // return $status===Password::RESET_LINK_SENT
        // ? redirect()->route('auth.forgot-password')->with(['status' => __($status)])
        // :  redirect()->route('auth.forgot-password')->withErrors(['email' => __($status)]);

        dd($status, Password::RESET_LINK_SENT);
    }

    public function reset_mail(Request $request){
        $email=$request->email;
        return view('auth.reset-password',compact('email'));
    }

    public function update_pwd(Request $request){
        $pwdrs= DB::table('password_resets')->where('email', $request->email)->first();

        $now=Carbon::now();
        $dt = $pwdrs->created_at;
        $dt->addSecond(3*3600);
        $result = $dt->gte($now);
        if( $result){
            $request->validate([
                // 'token' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:3',
            ]);

            $user=User::where('email','like',$request->email) -> first();
            $user->password = $request->password;
            $user['password']= bcrypt($user['password']);
            $user->save();
            echo('succes');
            return view('login');

        }else{
            echo('Expired.Request is valid in 3h from '.$dt);
        }
    }
}
