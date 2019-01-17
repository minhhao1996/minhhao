<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditCatRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CatalogRequest;
use App\Catalog;
use App\Product;


class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $cat = Catalog::select('id', 'parent_id', 'name', 'create_at', 'keyword')->orderBy('id', 'DESC')->paginate(5);
        $name = $request->search;
        if(!empty($name))
        {
            $cat = Catalog::where('name', 'like', '%' .$name. '%')->get()->orderBy->toArray();
            return view('admin/catalog.catalog')->with(['cat'=>$cat]);
        }
        return view('admin/catalog.catalog', ['cat' => $cat]);
    }

    public function getAdd()
    {

        $parent = Catalog::where('parent_id', 0)->get()->toArray();;

        return view('admin/catalog.addCatalog', compact('parent'));
    }

    public function postAdd(CatalogRequest $request)
    {
        //Tu tao Request kiem tra lai CatalogRequest
        $cat = new Catalog;
        $cat->name = $request->name;
        $cat->parent_id = $request->parentid;
        $cat->location = $request->orders;
        $cat->keyword = $request->keyword;
        if(!empty($request->icon)){
            $avatar= $request->file('icon')->getClientOriginalName();
            $request->file('icon')->move('upload/category/icon',$avatar);
            $cat->icon=$avatar;
            $cat->save();
        }
        $cat->save();
        return redirect('admin/catalog')->with(['status' => 'Insert Catalog Success!'])->with(['color' => 'success']);

    }

    public function edit($id)
    {
        $data = Catalog::find($id)->toArray();
        $list =Catalog::where('parent_id',0)->get();
        if (!$data) {
            return redirect('admin/catalog')->with(['status' => 'Danh mục không tồn tại!']);
        }
        return view('admin/catalog.editCatalog', compact('data','list'));
    }

    public function postEdit(EditCatRequest $request, $id)
    { //kiem tra bang request mac dinh valitor

        $cat = Catalog::find($id);
        $cat->name = $request->name;
        $cat->parent_id = $request->parentid;
        $cat->location = $request->orders;
        $cat->keyword = $request->keyword;
        $cat->update_at = now();
        if (!empty($request->file('icon'))){
            File::delete('upload/category/icon/'.$cat->icon);
            $cat->delete($id);
            $avatar= $request->file('icon')->getClientOriginalName();
            $cat->icon=$avatar;
            $request->file('icon')->move('upload/category/icon',$avatar);

        }else{
            echo "Không có ảnh";
        }
        $cat->save();

        return redirect('admin/catalog')->with(['status' => 'Edit Catalog Success!'])->with(['color' => 'info']);

    }

    public function delete($id)
    {
        $parent = catalog::where('parent_id', $id)->count();
        $poroduct = Product::where('cat_id', $id)->count();
        if ($parent == 0) {
            if ($poroduct == 0) {
                $cat = catalog::find($id);
                $cat->delete();
                return redirect('admin/catalog')->with(['status' => 'Delete Catalog Success!'])->with(['color' => 'danger ']);
            }
            return redirect('admin/catalog')->with(['status' => 'Sorry Your Cannot Delete This Catalog !! Product Fount !'])->with(['color' => 'danger ']);
        } else {
            return redirect('admin/catalog')->with(['status' => 'Sorry Your Cannot Delete This Catalog ! Catalog  Fount'])->with(['color' => 'danger ']);
        };

    }

    public function recyclebin()
    {
        $parent = Catalog::select('id', 'parent_id', 'name')->get()->toArray();
        return view('admin/catalog.recCatalog', compact('parent'));

    }
}
