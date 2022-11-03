<?php

namespace App\Http\Controllers\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewAllProductController extends Controller
{
    function get_all_product(){
        $products = DB::table('products')->first();//


        return view('product.view')->with('products',$products); //
    }
}
