<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('manajemen_user.index',compact('users'));
    }

    public function create(){
        return view('manajemen_user.create');
    }

    public function post(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('manajemen_user.index')->with(['success'   =>  'Data Berhasil Disimpan']);
    }

    public function delete(User $user){
        $user->delete();
        return redirect()->route('manajemen_user.index')->with(['success'   =>  'Data Berhasil Dihapus']);
    }
}