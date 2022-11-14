<?php

namespace App\Http\Controllers\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Input;


class ViewAllProductController extends Controller
{

    function get_all_product(){
        $products = (new Product())
            ->orderBy('id', 'asc')
           ->paginate(25);//;
          // dd($products);
         //dd($products->images()->get()->get(0)->name, $products->images[0]->name);
        return view('product.view', compact('products'));

        //return redirect()->route('ViewDetailProductController.view',[$products]);
    }

    function create_new_product(Request $request){
        //dd($request->all());

        // $p->id =
        // $p->name =x

        $product = (new Product)->create([
            'id'=>  $request->id,
            'name'=>  $request->name,
            'category'=> $request->category
        ]);
        //dd($product);
        $product->details()->create([
            'description' => $request->description,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'color' => $request->color,
            'unit' => $request->unit,
            'is_tax' => $request->is_tax,
        ]);
        //dd($p);
        return redirect()->route('ViewProductController.view');
    }
    //Dependency Injection
    function edit_product(Request $request, Product $product){
        return  view('product.edit', compact('product'));
    }


    function update_product(Product $product, Request $request){
        $dataProduct = $request->only(['name','category']);
        $dataDetails = $request->only(['description','quantity','color','is_tax','unit']);



        // dd($dataDetails);
        // $p = (new Product);

        // if(isset($input->name)){
        //     $p->where('name' ....)
        // }

        // if(isset($input->description)){
        //     $p->where('description' ....)
        // }
        // $p->get()
        DB::transaction(function() use ($dataProduct, $dataDetails, $product){
            //SAVE PRODUCT
            (new Product)->where('id','=',$product->id)->update($dataProduct);
            (new ProductDetail)->updateOrCreate(['product_id' => $product->id], $dataDetails);



        }, 1);



        return  redirect()->route('ViewProductController.view');
    }


    function search_product(Request $request){
        // $isTax = false;
        // if(isset($request->is_tax)){
        //     $isTax = (bool) $request->is_tax;
        // }

        // $isTax = isset($request->is_tax) ? $request->is_tax : false;

        // $isTax = (bool) optional($request->is_tax, 'false');


        //dd($name, $isTax);

        // if(is_null($request->is_tax)){
        //     $isTax = $request->is_tax ?: 'false';
        // }


        //c1
        // $products = Product::whereHas('details', function(Builder $query) use ($name, $isTax){
        //     $query->where('name','LIKE','%'.$name.'%');
        //     $query->where('is_tax', '=', $isTax);
        // })->orderBy('id')->paginate(5);
        //dd($products);


        // dd($isTax);
        //join

        // $products = (new Product)
        //             ->join('product_details', 'products.id', '=', 'product_details.product_id')
        //             ->where('name','LIKE','%'.$name.'%')
        //             ->whereIn('is_tax',$isTax)
        //             ->orderBy('products.id')->paginate(5);
        $name = $request->name ?: '';
        $isTax= [];
        if(!is_null($request->is_tax)){
            $isTax= array($request->is_tax);
        }
        if(is_null($request->is_tax)){
            $isTax= array('true','false');
        }
        //with
        $products =(new Product)->with('details')
                                ->whereHas('details',function($query) use( $name,$isTax)
                                {
                                    $query->where('name','LIKE','%'.$name.'%');
                                    $query->whereIn('is_tax',$isTax);
                                })
                                ->paginate(25);

           // dd($products);
        //Product::with('');


        // dd($products->all()[0],
        //     $products->all()[0]->getPerPage(),
        //     $products->all()[0]->exists
        // );

        // if(!is_null($request->name)){


        //dd();
        // }
        // if(!is_null($request->is_tax) && !is_null($request->name)){
        //     $bool = $request->is_tax;
        //     $products = $this->findByTax($bool);
        // }



        // $q = Product::query();
        // if(!is_null($request->name))
        // {
        //     $q->searchName($request->name);
        // }

        // if (!is_null($request->is_tax))
        // {
        //     $q->searchTax($request->is_tax);
        // }
        // $products = $q->orderBy('id')->paginate(5);
        return view('product.view',compact('products'));
    }

    function findByTax($bool){
        $products =  Product::whereHas('details',function(Builder $query) use ($bool){
            $query->where('is_tax','=',$bool);
            })->get();
        return $products;
    }

    function delete_product(Product $product){
        if($product->delete()){
            return redirect()->route('ViewProductController.view');
        }else{
           echo'Delete fails';
        }
    }

    function delete_selected(Request $request){
        //dd($request->toArray());
        (new Product)->whereIn('id',$request->delete_array)->delete();
        return redirect()->route('ViewProductController.view');
    }
}
