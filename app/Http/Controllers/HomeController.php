<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Catalog;
use phpDocumentor\Reflection\Project;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //  public function __construct()
    //{
    //   $this->middleware('auth');
    //}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $catPhone = Catalog::where('parent_id', 0)->orderBy('location', 'asc')->limit(2)->get();
        $pro_sale = Product::select('avatar', 'name', 'id', 'price', 'discount','status')
            ->orderBy('discount', 'DESC')->limit(8)
            ->get()->toArray();
        foreach ($catPhone as $item) {
            $subs = Catalog::where('parent_id', $item['id'])->orderBy('location', 'asc')->get();
            $item->subs = $subs;
        }
        return view('font-end/home.home', compact('pro_sale'))->with(['catPhone' => $catPhone]);
    }

    public function category($id)
    {

        // danh mục hiện tại
        $Cate = Catalog::where('id', $id)->get();
        foreach ($Cate as $item) {
            $subs = Catalog::where('id', $item['parent_id'])->get()->toArray();;
            $item['subs'] = $subs;
        }
        // danh sách tất cả danh mục
        $cat_main = Catalog::where('parent_id', 0)->orderBy('location', 'asc')->get();
        foreach ($cat_main as $row) {
            $subs = Catalog::where('parent_id', $row['id'])->get();
            $row->subs = $subs;
        }

        $data = Catalog::where('parent_id', $id)->get()->toArray();
        if (!empty($data)) {
            $cat_id = array();
            foreach ($data as $row) {
                $cat_id[] = $row['id'];
            }
            $pro = Product::whereIn('cat_id', $cat_id)->orderBy('create_at', 'desc')->get()->toArray();
            return view('font-end/home.category', compact('Cate','cat_main'))->with(['pro_cat' => $pro]);
        } else {
            $pro = Product::where('cat_id', $id)->orderBy('create_at', 'desc')->get()->toArray();
            return view('font-end/home.category', compact('Cate', 'cat_main'))->with(['pro_cat' => $pro]);
        }
    }

    public function search(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data=  Product::where('name', 'like', '%' .$query. '%')->get();
            $output = '<ul class="list-group list-search" >';
            foreach($data as $row)
            {
                $output .= '<li class="list-group-item"><a>'.$row->name.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }else{

            $cat_main = Catalog::where('parent_id', 0)->orderBy('location', 'asc')->get();
            foreach ($cat_main as $row) {
                $subs = Catalog::where('parent_id', $row['id'])->get();
                $row->subs = $subs;
            }
            // search product
            $pro_search= Product::select('avatar', 'name', 'id', 'price', 'discount','create_at')
                -> where('name', 'like', '%' .$request->search. '%')
                ->orderBy('create_at', 'DESC')->paginate(12);
            return view('font-end/home.search',compact('cat_main','pro_search'));

        }

    }



}
