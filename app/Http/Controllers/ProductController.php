<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProductRequest;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Product;
use App\Catalog;
use App\ProductImage;
use App\MakerModel;



class ProductController extends Controller
{
    public  function  index(Request $request){

        $product =Product::select('id','name','cat_id','avatar','price','discount','total','status')->orderBy('id','DESC')->paginate(5);
        $catalogs =Catalog::where('parent_id',0)->get();
        foreach ($catalogs as $row)
        {
            $subs =Catalog::where('parent_id',$row->id)->get();
            $row->subs = $subs;
        }
        $name = $request->search;
        if(!empty($name))
        {
            $product = Product::where('name', 'like', '%' .$name. '%')->paginate(10);
            return view('admin/product.product')->with(['product'=>$product])->with(['catalogs'=>$catalogs]);
        }
        $cat = $request->category;
        if(!empty($cat))
        {
            $product = Product::where('cat_id',$cat)->paginate(10);
            return view('admin/product.product')->with(['product'=>$product])->with(['catalogs'=>$catalogs]);;
        }

        return view('admin/product.product')->with(['product'=>$product])->with(['catalogs'=>$catalogs]);

    }
    public function getAdd()
    {
        $catalogs =Catalog::where('parent_id',0)->get();
        foreach ($catalogs as $row)
        {
            $subs =Catalog::where('parent_id',$row->id)->get();
            $row->subs = $subs;
        }
        $maker =MakerModel::select('id','name')->get()->toArray();;

        return view('admin/Product.addProduct',compact('catalogs','maker'));
    }
    public function postAdd(ProductRequest $request)
    {
        $avatar= $request->file('avatar')->getClientOriginalName();
        $pro = new Product();
        $pro->name=$request->name;
        $pro->cat_id=$request->catid;
        $pro->maker_id=$request->maker;
        $pro->discount=str_replace(',', '', $request->sale);
        $pro->price= str_replace(',', '', $request->price_buy);
        $pro->total=$request->total;
        $pro->title=$request->title;
        $pro->contents=$request->contents;
        $pro->gifts=$request->gifts;
        $pro->warranty=$request->warranty;
        $pro->avatar=$avatar;
        $request->file('avatar')->move('upload/product/avatar',$avatar);
        $pro->save();
        if($request->hasFile('photos')) {
            $allowedfileExtension=['jpg','png'];
            $files = $request->file('photos');
            // flag xem có thực hiện lưu DB không. Mặc định là có
            $exe_flg = true;
            // kiểm tra tất cả các files xem có đuôi mở rộng đúng không
            foreach($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $check=in_array($extension,$allowedfileExtension);
                if(!$check) {
                    // nếu có file nào không đúng đuôi mở rộng thì đổi flag thành false
                    $exe_flg = false;
                    break;
                }
            }
            // nếu không có file nào vi phạm validate thì tiến hành lưu DB
            if($exe_flg) {
                // lưu product
                $products= $pro->id;
                // duyệt từng ảnh và thực hiện lưu
                foreach ($request->photos as $photo) {
                    $photo->move('upload/product/detail/',$photo->getClientOriginalName());
                    $filename = $photo->getClientOriginalName();
                    ProductImage::create([
                        'product_id' => $products,
                        'file_name' => $filename
                    ]);
                }
                echo "Upload successfully";
            } else {
                echo "Falied to upload. Only accept jpg, png photos.";
            }
        }
        return  redirect('admin/product');


    }
    public function delete($id)
    {
        $product_image = Product::find($id)->productImage;
        foreach ($product_image as $row){
            File::delete('upload/product/detail/'.$row["file_name"]);
            $row->delete();
        }
        $product = Product::find($id);
        File::delete('upload/product/avatar/'.$product->avatar);
        $product->delete($id);
        return redirect('admin/product')->with(['status' => 'Delete Product Success!'])->with(['color' => 'danger ']);
    }

    public function edit($id)
    {
        //lay danh sach danh muc san pham
        $catalogs =Catalog::where('parent_id',0)->get();
        foreach ($catalogs as $row)
        {
            $subs =Catalog::where('parent_id',$row->id)->get();
            $row->subs = $subs;
        }
        // Lấy Danh sách nhà cung cấp

        $maker =MakerModel::select('id','name')->get()->toArray();;
        $data = Product::find($id)->toArray();
        $product_img = Product::find($id)->productImage;
        if (!$data) {
            return redirect('admin/product')->with(['status' => 'Product Fount Not!'])->with(['color' => 'success']);
        }

        return view('admin/product.editProduct', compact('maker', 'data', 'catalogs','product_img'));
    }

    public function postEdit(EditProductRequest $request, $id)
    { //kiem tra bang request mac dinh valitor

        $pro = Product::find($id);
        $pro->name=$request->name;
        $pro->cat_id=$request->catid;
        $pro->maker_id=$request->producer;
        $pro->title=$request->title;
        $pro->contents=$request->contents;
        $pro->discount=str_replace(',', '', $request->discount);
        $pro->price= str_replace(',', '', $request->price);
        $pro->total=$request->total;
        $pro->gifts=$request->gifts;
        $pro->warranty=$request->warranty;
        $pro->update_at = now();

        if (!empty($request->file('avatar'))){
            File::delete('upload/product/avatar/'.$pro->avatar);
            $pro->delete($id);
            $avatar= $request->file('avatar')->getClientOriginalName();
            $pro->avatar=$avatar;
            $request->file('avatar')->move('upload/product/avatar',$avatar);

        }else{
            echo "Không có ảnh";
        }
        $pro->save();

        if($request->hasFile('photos')) {
            $allowedfileExtension=['jpg','png'];
            $files = $request->file('photos');
            // flag xem có thực hiện lưu DB không. Mặc định là có
            $exe_flg = true;
            // kiểm tra tất cả các files xem có đuôi mở rộng đúng không
            foreach($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $check=in_array($extension,$allowedfileExtension);
                if(!$check) {
                    // nếu có file nào không đúng đuôi mở rộng thì đổi flag thành false
                    $exe_flg = false;
                    break;
                }
            }
            // nếu không có file nào vi phạm validate thì tiến hành lưu DB
            if($exe_flg) {
                // lưu product
                $products= $pro->id;
                // duyệt từng ảnh và thực hiện lưu
                foreach ($request->photos as $photo) {
                    $photo->move('upload/product/detail/',$photo->getClientOriginalName());
                    $filename = $photo->getClientOriginalName();
                    ProductImage::create([
                        'product_id' => $products,
                        'file_name' => $filename
                    ]);
                }
                echo "Upload successfully";
            } else {
                echo "Falied to upload. Only accept jpg, png photos.";
            }
        }
        return redirect('admin/product')->with(['status' => 'Edit Catalog Success!'])->with(['color' => 'info']);

    }
    public function delImage(Request $request){
        $id=$request->idImage;
        $image=ProductImage::find($id);
        if (!empty($image)){
            $img='upload/product/detail/'.$image->file_name;
            if(File::exists($img)){
                File::delete($img);
            }
            $image->delete();
        }
        return "OK";
    }
    public function status($id){
        $product = Product::find($id);
        //$pro_s = new Product();
        $product->status=$status=($product['status']==1)?0:1;
        $product->save();
        return redirect('admin/product')->with(['status' => 'Edit Status Product Success!'])->with(['color' => 'info']);
    }
    public  function import($id){
        $pro= Product::find($id)->toArray();
        //lay danh sach danh muc san pham
        $catalogs =Catalog::where('parent_id',0)->get();
        foreach ($catalogs as $row)
        {
            $subs =Catalog::where('parent_id',$row->id)->get();
            $row->subs = $subs;
        }
        return view('admin/product.import',compact('pro','catalogs'));
    }
    public function postImport(Request $request, $id){
        $pro = Product::find($id);
        $pro->total=$request->total+$pro['total'];
        $pro->save();
        return  redirect('admin/product')->with(['status'=>'Import Product Success'])->with(['color' => 'success']);;
    }
    public function search(Request $request){
        //kiem tra co thuc hien loc du lieu hay khong


    }
}
