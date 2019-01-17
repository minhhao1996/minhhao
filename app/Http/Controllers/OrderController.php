<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\User;
use Auth;
use App\Province;
use App\District;
use App\Order;
use App\OrderDetails;
class OrderController extends Controller
{
    public function index()
    {
        $content= Cart::getContent()->toArray();
        $total= Cart::getTotal ();
        if (!empty(Auth::user()->id)){
            $profile = User::find(Auth::user()->id)->toArray();
            $distric=District::where('province_id',$profile['city_id'])->get()->toArray();
        }
        $city=Province::get()->toArray();
        return view('font-end/product.order',compact('content','total','city','profile','distric'));

    }
    public function getDistrict(Request $res){
        if(!empty($res->get('province_id'))){
            $district = District::where('province_id', $res->get('province_id'))->get();
            return $district;
        }

    }
    public function postCheckout(Request $res){
        $total= Cart::getTotal ();
        $order = new Order();
        if (!empty(Auth::user()->id)){
            $order->user_id=Auth::user()->id;
        }else{
            $order->user_id= 0;
        }
        $order->username= $res->name;
        $order->phone= $res->phone;
        $order->email= $res->email;
        $order->address= $res->address;
        $order->amount= $total;
        $order->data= $res->about;
        $order->payment= $res->payment;
        $order->save();
        return redirect('/');


    }


}
