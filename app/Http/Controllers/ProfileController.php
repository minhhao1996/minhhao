<?php

namespace App\Http\Controllers;

use App\District;
use App\Province;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\File;
use Auth;
class ProfileController extends Controller
{
    public function  index(){
             $profile = User::find(Auth::user()->id)->toArray();
            $city = Province::where('province_id',Auth::user()->city_id)->get()->toArray();
             $district = District::where('district_id',Auth::user()->district_id)->get()->toArray();
            print_r($city);



        return view('font-end/user.profile',compact('profile','city','district'));
    }
    public function editProfile(ProfileRequest $res){
             $city=Province::get()->toArray();
             $profile = User::find(Auth::user()->id)->toArray();
             $distric=District::where('province_id',$profile['city_id'])->get()->toArray();
             return view('font-end/user.editProfile',compact('profile','city','distric'));

    }
    public function getDistrict(Request $res){
        if(!empty($res->get('province_id'))){
            $district = District::where('province_id', $res->get('province_id'))->get();
            return $district;
        }

     }

    public function PostProfile(Request $request , $id){
        $about = User::find($id);
        $about->name= $request->name;
        $about->sex= $request->GenderId;
        $about->birthday= $request->birthday;
        $about->phone= $request->phone;
        $about->address= $request->address;
        $about->city_id= $request->country;
        $about->district_id= $request->district;
        if (!empty($request->avatar)){
            File::delete('images/avatar/'.$about->avatar);
            $about->delete($id);
            $avatar= $file = $request->file('avatar')->getClientOriginalName();
            $about->avatar=$avatar;
            $request->file('avatar')->move('images/avatar',$avatar);
            $about->save();
        }
        $about->save();

        return redirect('profile')->with(['status' => 'Edit Catalog Success!'])->with(['color' => 'info']);
    }

}
