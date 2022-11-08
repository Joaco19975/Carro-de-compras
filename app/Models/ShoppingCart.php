<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;
    protected $fillable = ['status'];

    public function inShoppingCarts(){
        return $this->hasMany('App\Models\InShoppingCart');
    }

    public function products (){
            return $this->belongsToMany('App\Models\Product', 'in_shopping_carts');
    }

    public function total(){
        return $this->products()->sum("price");
    }

    public function productSize(){
        return $this->products()->count();
    }

    // usualmente vas a tener dos tipos de metodos, los metodos integradores (se encargan de integrear la funcionalidad de otros)
    // y los metodos que hacen las cosas ej findOrCreateBySessionID
    //recibimos una sesion, si es nula, creamos un carrito, en caso de que no encontremos ningun carrito con este id hay q crearlo
    //si lo encontramos hay que retornarlo
    public static function findOrCreateBySessionID($shopping_cart_id){

            if($shopping_cart_id)
            {
                //buscar el carrito de compras ID
                return ShoppingCart::findBySession($shopping_cart_id);
            } else {
                //creamos carrito de compras
                return ShoppingCart::createWithoutSession();
            }

    }

    public static function findBySession($shopping_cart_id){
        return ShoppingCart::find($shopping_cart_id);
    }

    public static function createWithoutSession(){
        return ShoppingCart::create([
            "status" => "incompleted"
        ]);
    }
}
