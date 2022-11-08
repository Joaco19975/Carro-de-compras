<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', ["products" => $products]);
    }

    public function create()
    {
        $product = new Product();
        return view('products.create', ["product" => $product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->user_id = Auth::user()->id; //objeto del usuario que inicio sesion
        $product->save();

           if($product->save())
           {
            return redirect('/products');
            }else{
                    return view('products.create', ["product" => $product]);
                }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $product = Product::find($id);
        return view('products.show', ["product" => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', ["product" => $product]);
    }

    public function update(Request $request, $id)
    {
        
        $product = Product::findOrFail($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
       

           if($product->save())
           {
            return redirect('/products');
            }else{
                    return view('products.edit', ["product" => $product]);
                }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
         if($product){
            Product::destroy($id);

            return redirect('/products');
         }else{
            echo "Product not found";
         }
        
    }
}
