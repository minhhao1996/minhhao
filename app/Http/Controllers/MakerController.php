<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditMakerRequest;
use App\Http\Requests\MakerRequest;
use Illuminate\Http\Request;
use App\MakerModel;
use  App\Product;

class MakerController extends Controller
{
    public function index(Request $request)
    {

        $maker = MakerModel::select('id', 'code', 'name', 'create_at', 'keyword')->orderBy('id', 'DESC')->paginate(5);
        $name = $request->search;
        if(!empty($name))
        {
            $maker = MakerModel::where('name', 'like', '%' .$name. '%')->get()->toArray();
            return view('admin/maker.maker')->with(['maker'=>$maker]);
        }
        return view('admin/maker.maker', ['maker' => $maker]);
    }

    public function getAdd()
    {
        return view('admin/maker.addMaker');
    }

    public function postAdd(MakerRequest $request)
    {
        //Tu tao Request kiem tra lai CatalogRequest
        $maker = new MakerModel;
        $maker->name = $request->name;;
        $maker->code = $request->code;
        $maker->keyword = $request->keyword;
        $maker->status = $request->status;
        $maker->create_at = now();
        $maker->save();

        return redirect('admin/maker')->with(['status' => 'Insert maker Success!'])->with(['color' => 'success']);;

    }

    public function edit($id)
    {
        $data = MakerModel::find($id)->toArray();
        if (!$data) {
            return redirect('admin/catalog')->with(['status' => 'Danh mục không tồn tại!']);
        }
        return view('admin/maker.editMaker', compact('data'));
    }

    public function EditMaker(EditMakerRequest $request, $id)
    {
        $eit = MakerModel::find($id);
        $eit->name = $request->name;;
        $eit->code = $request->code;
        $eit->keyword = $request->keyword;
        $eit->status = $request->status;
        $eit->update_at = now();
        $eit->save();
        return redirect('admin/maker')->with(['status' => 'Edit Maker Success!'])->with(['color' => 'info']);;

    }

    public function delete($id)
    {
        $delete = MakerModel::find($id)->toArray();
        if (!$delete) {
            return redirect('admin/maker')->with(['status' => 'Maker Fount Not!'])->with(['color' => 'danger ']);;
        }
        $poroduct = Product::where('maker_id', $id)->count();
        if ($poroduct == 0) {
            $mk = MakerModel::find($id);
            $mk->delete();
            return redirect('admin/maker')->with(['status' => 'Delete Maker Success!'])->with(['color' => 'danger ']);;
        } else {
            return redirect('admin/maker')->with(['status' => 'Sorry Your Cannot Delete This Maker,Product Found !'])->with(['color' => 'danger ']);;
        }

    }
}
