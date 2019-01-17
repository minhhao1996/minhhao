<?php

namespace App\Http\Controllers;

use Cart;
use Auth;
use Illuminate\Http\Request;
use App\Product;


class CartController extends Controller
{
    //

    public function addCart($id){
        $pro_buy= Product::where('id',$id)->first();
        $price =$pro_buy->price-$pro_buy->price*$pro_buy->discount/100;
        $image=$pro_buy->avatar;

        Cart::add(array('id'=>$id,'name'=>$pro_buy->name,'quantity'=>1,'price'=>$price,
            'attributes'=>array('img' => $image)));
        if (!empty( Auth::user()->id)){
            $userId = Auth::user()->id;
            Cart::session($userId)->add(array('id'=>$id,'name'=>$pro_buy->name,'quantity'=>1,'price'=>$price,
                'attributes'=>array('img' => $image)));}

        return redirect()->route('cart','info-order');

    }
    public function index()
    {
        $content= Cart::getContent()->toArray();
        $total= Cart::getTotal ();
        return view('font-end/product.cart',compact('content','total'));

    }
    public function removeCart($id){
        Cart::remove($id);
        return redirect()->route('cart');
    }
    public function updateCart(Request $request)
    {
        $id=$request->id;
        $quantity=$request->qty;
        Cart::update($id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $quantity
            ),
        ));
        echo ("OK");

    }
}
