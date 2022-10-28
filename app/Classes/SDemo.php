<?php
namespace App\Classes;

class SDemo
{

    static function info(){
        //self::info_a();

       echo (new self)->info_a();
       //self ::  $this ->
    }

    function info_a(){
        return 'static class info a';
    }
}
