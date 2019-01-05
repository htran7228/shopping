<?php

namespace App\Http\Controllers;
use App\Product;
use App\Cart;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ProductsController extends Controller
{
    //
    public function index(){

      /*  $products = [ 0 => ["name"=>"Iphone", "category"=>"Smart Phone", "price"=>"1000"],
        1 => ["name"=>"Sony", "category"=>"Tablet", "price"=>"2000"],
        2 => ["name"=>"Samsung", "category"=>"TV", "price"=>"3000"]
    ]; */
    $products = Product::all();

    return view("allproducts",compact('products'));

    }

    public function addProductToCart(Request $request, $id){

        $prevCart = $request->session()->get('cart');
        $cart = new Cart($prevCart);

        $product = Product::find($id);
        $cart->addItem($id,$product);
        $request->session()->put('cart',$cart);

        return redirect()->route("allProducts");


    }

    public function showCart(){

        $cart = Session::get('cart');
        //cart is not empty
        if($cart){
            return view('cartproducts', ['cartItems' => $cart]);

        //cart is empty
        }else{

            return redirect()->route("allProducts");
        }

    }


}
