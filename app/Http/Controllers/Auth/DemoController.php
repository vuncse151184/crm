<?php

namespace App\Http\Controllers\Auth;

use App\Classes\SDemo;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function demoworkshop1(){
        //$ds = new DashboardController();
        //dd($this);
        echo SDemo::info();
    }
    public function demoworkshop2() : \Illuminate\Contracts\View\View
    {
        demo_global();

        return view('auth.index');
    }

    // bool getTrueFale(Int a)
    //Override: viet lai function: cung chu ki ham
    //Overload: viet lai function: khac gia tri truyen vao, kieu tra ve
    public function demo_a(){
        return 'demo_abc';
    }

    function callName(){
        return 'Demo1';
    }
}


//INSTANCE -> new


// CLASS -> INSTANCTIABLE
// ABSTRACT CLASS
// INTERFACE

// ENUM -> thay the
// STRUCT -> mixed
// TRAIT
