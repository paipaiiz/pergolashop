<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\ReturnProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReturnController extends Controller
{
    public function return(Request $request)
    {
        return view('User.return');
    }
    public function store(Request $request)
    {
        $datas = $request->validate([
            'fullname' => 'required',
            'tel' => 'required',
            'house_number' => 'required',
            'district' => 'required',
            'amphore' => 'required',
            'province' => 'required',
            'postal_code' => 'required',
            'note' => 'required',
            'product_name' => 'required',
            'code' => 'required',
            'amount' => 'sometimes',
        ]);
        $checkOrder = Order::where('code', $datas['code'])->first();

        if ($checkOrder) {
            $user_id =  Auth::user()->id;
            $datas['image'] = $request->product_image->store('images', 'public');
            $datas['user_id'] = $user_id;
            ReturnProduct::create($datas);
            if (!$datas) {
                return redirect('/return')->with('error', 'ยื่นคำร้องขอเคลมสินค้าไม่สำเร็จ กรุณาตรวจสอบอีกครั้ง');
            } else {
                return redirect('/return')->with('success', 'ยื่นคำร้องขอเคลมสินค้าสำเร็จ');
            }
        } else {
            return redirect('/return')->with('error', 'ยื่นคำร้องขอเคลมสินค้าไม่สำเร็จ กรุณาตรวจสอบรหัสรายการสินค้าอีกครั้ง');
        }
    }
    public function update($id, Request $request)
    {
        $user = Auth::user()->status ?? null;
        if ($user === 'admin') {
            ReturnProduct::find($id)->update(['status' => $request->status]);
            return redirect('/admin/return');
        } else {
            return view('404');
        }
    }
    public function detail($id)
    {
        $user = Auth::user()->status ?? null;
        if ($user === 'admin') {
            $datas = ReturnProduct::where('id', $id)->first();
            return view('admin.returnDetail', ['data' => $datas]);
        } else {
            return view('404');
        }
    }
}
