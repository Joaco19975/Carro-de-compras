<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShoppingCart;
use App\Models\InShoppingCart;

class InShoppingCartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shopping_cart_id = \Session::get("shopping_cart_id");

            $shopping_cart = ShoppingCart::findOrCreateBySessionID( $shopping_cart_id);
            \Session::put("shopping_cart_id", $shopping_cart->id);

          $response =  InShoppingCart::create([
                "shopping_cart_id" => $shopping_cart->id,
                "product_id" => $request->product_id,
            ]);

            if($response){
                return redirect('/carrito');
             }else {
                return back();
              }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
