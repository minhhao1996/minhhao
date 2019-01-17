<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Catalog;
use App\ProductImage;

class DetailsController extends Controller
{
    public  function  index($id){
        $det=Product::where('id',$id)->orderBy('update_at','desc')->get()->toArray();

        foreach ($det as $item){
            $cate =Catalog::where('id',$item['cat_id'])->select('id','name')->get()->toArray();
            foreach ($cate as $row){
                $pro_like =Product::where('cat_id',$row['id'])->where('id','<>',$id)->select('id','name','avatar','price','discount','status')
                    ->limit(8)->orderBy('update_at','desc')->get()->toArray();
            }
        };
        $detImg=ProductImage::where('product_id',$id)->get()->toArray();
        return view('font-end/product/details',compact('det','detImg','cate','pro_like'));
    }
}
