<?php
namespace App\Constracts;

use Illuminate\Http\Request;


interface IUserAuthen {
    public function login(Request $request) ;
    public function logout() : \Illuminate\Http\RedirectResponse;
    function register(Request $request) :\Illuminate\Http\RedirectResponse;
}
