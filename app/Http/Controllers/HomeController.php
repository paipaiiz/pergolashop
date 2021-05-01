<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function service()
    {
        return view('User.service');
    }
    public function edit($id)
    {
        $user =  User::where('id', $id)->first();
        return view('User.edit', ['user' => $user]);
    }
    public function update($id, Request $request)
    {
        $datas = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'sometimes',
        ]);
        if ($datas['password']) {
            $datas['password'] = Hash::make($datas['password']);
        }else{
            $datas['password'] = Auth::user()->password;
        }
        User::find($id)->update($datas);
        if (!$datas) {
            return redirect('edit/profile/' . $request->id)->with('fail', 'กรุณากรอกข้อมูลให้ครบถ้วน');
        } else {
            return redirect('edit/profile/' . $request->id)->with('success', 'แก้ไขข้อมูลผู้ใช้สำเร็จ');
        }
    }
}
