<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductImageController extends Controller
{
    function add(Request $request){
        $products = Product::find($request->id);

        $target_dir = public_path("img/");
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        $newFile = public_path('img/'.md5(now()).'.'.$imageFileType);

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newFile)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
          } else {
            echo "Sorry, there was an error uploading your file.";
        }


        dd($request->all());
        // storage_path()
        // app_path()
        // resource_path()
        // config_path()
        // database_path()
        // base_path()


















        // if($about->photo != $request->photo){
        //     $strpos= strpos($request->photo,";");

        //     $sub = substr($request->photo,0,$strpos);

        //     $ex = explode('/',$sub)[1];
        //     $time = time();
        //     $namecv = "$time.$ex";
        //     //dd($namecv);
        //     $img = Image::make($request->photo)->resize(700,500);

        //     $upload_path = public_path("/img/upload/");
        //     $image = $upload_path.$about->photo;
        //     $img->save($upload_path.$namecv);

            // if (!empty($about->photo)) {
            //     if(file_exists($about->photo)){
            //         @unlink($about->photo);

            //     }
            // }


    }
}
