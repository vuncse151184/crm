<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\DemoController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\UpdateAuthController;
use App\Http\Controllers\Product\ProductImageController;
use App\Http\Controllers\Product\ViewAllProductController;
use App\Http\Controllers\Product\ViewDetailProductController;
use App\Models\Product;
use Illuminate\Auth\Events\PasswordReset;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//GET, POST, PUT, PATCH, DELETE dung  trong RESTFUL API Body payload


// Route::get('/', function(){
//      return view('auth.index');
// })->name('home');

Route::get('/login', function(){
    return view('auth.login');
})->name('login');

Route::get('/forgot-password', function(){
    return view('auth.forgot-password');
})->name('forgot-password'); //->middleware('guest')

Route::get('/register', function(){
    return view('auth.register');
})->name('register');

Route::get('/dashboard',[DashboardController::class,'get_user_info'])->name('dashboard');

Route::controller(AuthController::class)->group(function(){
    Route::match(['post', 'get'],'/auth/login','login')->name('login_controller');
    Route::match(['post', 'get'],'/auth/register','register')->name('register_controller');
    Route::get('/logout','logout')->name('logout');
});

// Route::prefix('/auth')->group(function(){
//     Route::controller(AuthController::class)->group(function(){
//         Route::match(['post','get'],'/login','login')->name('auth..login');
//         Route::match(['post','get'],'/register','register')->name('auth..register');
//         Route::get('/logout','logout')->name('logout');
//     });
// });

Route::match(['post', 'get'],'/password.reset',[PasswordResetController::class,'sent_mail'])->name('password.reset');
Route::match(['post', 'get'],'/passwordreset',[PasswordResetController::class,'reset_mail'])->name('password.update');
Route::post('/passwordupdate',[PasswordResetController::class,'update_pwd'])->name('update_pwd');

//
// function(){
//     view('auth.reset-password');
// }

// URL: /demo/workshop1 -> FUNC: workshop1
// URL: /demo/workshop2 -> FUNC: workshop2

use Laravel\Socialite\Facades\Socialite;
Route::controller(DemoController::class)->prefix('/demo')->group(function(){
    Route::get('workshop1','demoworkshop1')->name('demo.workshop1'); // name('baitap.demo..workshop')
    Route::get('workshop2','demoworkshop2')->name('demo.workshop2');

    Route::get('/workshop3', function(){
        demo_global();
    });

    Route::get('/workshop4', function(){
        //Socialite::driver('github')->redirect();
    });
    // demo/workshop1

    // demo/workshop1/caua
});

Route::get('/edit/{id}',[UpdateAuthController::class,'update_user_info'])->name('update');




Route::get('/product/createnew',function(){
    return view('product.create');
})->name('create');
Route::controller(ViewAllProductController::class,)->group(function(){
    Route::get('/product/view','get_all_product')->name('ViewProductController.view');
    Route::get('/product/delete/{product}','delete_product')->name('productdetele');
    Route::get('/product/{product}/edit','edit_product')->name('product..edit');
    Route::post('/product/{product}/update','update_product')->name('product.update');
    Route::get('/product/delete_selected','delete_selected')->name('product.delete_selected');
    Route::get('/product/search','search_product')->name('product.searchbyname');
    Route::match(['post', 'get'],'/product/create/new','create_new_product')->name('product.create_new');

    //Route::post('/product/create','create_new_product')->name('product.create');

});


Route::get('/pt', function(){
    dd((new Product), Product::instance());
     //);
});

Route::get('/product/add_img/{product}',function(){
    return view('product.img');
})->name('img');

Route::controller(ProductImageController::class,)->group(function(){
    Route::post('/product/addnewimg','add')->name('productImage.add');
});
