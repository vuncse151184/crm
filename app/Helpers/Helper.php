<?php

// function demo_global(){
//     echo 'demo global function';
// }

if(!function_exists('demo_global')){
    function demo_global(){
        echo 'demo global function 1';
    }
}

if(!function_exists('printf')){
    function printf($message){
        echo$message;
    }
}
