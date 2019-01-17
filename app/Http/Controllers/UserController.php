<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{

    public function login(){
        return view('admin/user.login');
    }
    public function postLogin(Request $request){
        $login= array(
            'email'=>$request->email,
            'password'=>$request->password,
            'level'=>1
        );
        if (Auth::attempt($login)){
            return redirect('admin');
        }else{
            return redirect()->back();
        }
    }
    public function index(Request $request){
        $users = User::select('id', 'name', 'email', 'phone', 'level','email_verified_at')->orderBy('id', 'DESC')->paginate(5);
        $name = $request->search;
        if(!empty($name))
        {
            $users = User::where('name', 'like', '%' .$name. '%')->orderBy('id', 'DESC')->paginate(5);
            return view('admin/user.user')->with(['users'=>$users]);
        }
        $level = $request->level;
        if(!empty($level))
        {
            $users = User::where('level',$level )->orderBy('id', 'DESC')->paginate(5);
            return view('admin/user.user')->with(['users'=>$users]);
        }
        return view('admin/user.user', ['users' => $users]);
    }

    public function edit($id){
        $data = User::find($id)->toArray();
        return view('admin/user.editUser',compact('data'));
    }
    public function editUser(Request $request, $id){
        $user = User::find($id);
        $user->level = $request->level;
        $user->updated_at = now();
        $user->save();
        return redirect('admin/user')->with(['status' => 'Edit User Success!'])->with(['color' => 'info']);;
    }
}
