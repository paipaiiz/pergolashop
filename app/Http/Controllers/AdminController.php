<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\OrderDetail;
use App\Models\ReturnProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user()->status ?? null;
        if ($user === 'admin') {
            $datas = Product::all();
            return view('admin.order', ['data' => $datas]);
        } else {
            return view('404');
        }
    }
    public function order()
    {
        $user = Auth::user()->status ?? null;
        if ($user === 'admin') {
            $datas = Order::with(['orderdetail', 'user'])->where('status', '!=', 'ยกเลิก')->get();
            $date = Carbon::now()->isoFormat('DD/MM/YYYY');
            return view('admin.order', ['data' => $datas, 'date' => $date]);
        } else {
            return view('404');
        }
    }
    public function all()
    {
        $user = Auth::user()->status ?? null;
        if ($user === 'admin') {
            $datas = Product::all();
            return view('admin.product', ['data' => $datas]);
        } else {
            return view('404');
        }
    }
    public function show($id)
    {
        $user = Auth::user()->status ?? null;
        if ($user === 'admin') {
            $datas = Product::find($id);
            return view('admin.edit', ['data' => $datas]);
        } else {
            return view('404');
        }
    }
    public function home()
    {
        $user = Auth::user()->status ?? null;
        if ($user === 'admin') {
            $order = Order::where('status', 'ยืนยัน')->get();
            $getOrder = Order::get();
            $user = User::all();
            return view('admin.index', ['order' => $order, 'user' => $user, 'getOrder' => $getOrder]);
        } else {
            return view('404');
        }
    }
    public function add()
    {
        $user = Auth::user()->status ?? null;
        if ($user === 'admin') {
            return view('admin.add');
        } else {
            return view('404');
        }
    }
    public function store(Request $request)
    {
        $user = Auth::user()->status ?? null;
        if ($user === 'admin') {
            $datas = $request->validate([
                'product_name' => 'required',
                'product_price' => 'required',
                'product_type' => 'required',
                'product_detail' => 'required',
                'product_ar_id' => 'sometimes',
                'product_360_link' => 'sometimes',
            ]);
            $datas['product_amount'] = 1;
            $datas['product_image'] = $request->product_image->store('images', 'public');
            $datas['date'] = Carbon::now();
            Product::create($datas);
            if (!$datas) {
                return redirect('/admin/add')->with('fail', 'เพิ่มสินค้าไม่สำเร็จ กรูณาตรวจสอบความถูกต้อง');
            } else {
                return redirect('/admin/manage')->with('success', 'เพิ่มสินค้าสำเร็จ');
            }
        } else {
            return view('404');
        }
    }
    public function update(Request $request)
    {
        $user = Auth::user()->status ?? null;
        if ($user === 'admin') {
            $datas = $request->validate([
                'product_name' => 'required',
                'product_price' => 'required',
                'product_type' => 'required',
                'product_detail' => 'required',
                'product_ar_id' => 'sometimes',
                'product_360_link' => 'sometimes',
            ]);
            $getOldPrice = Product::where('id', $request->id)->first();
            $datas['product_amount'] = 1;

            if (!$getOldPrice->product_old_price) {
                if ($getOldPrice->product_price > $datas['product_price']) {
                    $datas['product_old_price'] = $getOldPrice->product_price;
                    $datas['status'] = 'sale';
                }
            } else {
                if ($getOldPrice->product_old_price === $datas['product_price']) {
                    $datas['status'] = 'ปกติ';
                }
            }
            if ($request->hasFile('product_image')) {
                $datas['product_image'] = $request->product_image->store('images', 'public');
            }
            Product::find($request->id)->update($datas);
            if (!$datas) {
                return redirect('edit/' . $request->id)->with('fail', 'แก้ไขสินค้าไม่สำเร็จ กรูณาตรวจสอบความถูกต้อง');
            } else {
                return redirect('/admin/manage')->with('success', 'แก้ไขสินค้าสำเร็จ');
            }
        } else {
            return view('404');
        }
    }
    public function detail($id)
    {
        $user = Auth::user()->status ?? null;
        if ($user === 'admin') {
            $datas = OrderDetail::where('order_id', $id)->with('order')->get();
            return view('admin.orderDetail', ['data' => $datas]);
        } else {
            return view('404');
        }
    }
    public function delete($id)
    {
        $user = Auth::user()->status ?? null;
        if ($user === 'admin') {
            OrderDetail::where('product_id', $id)->delete();
            Product::find($id)->delete();
            return redirect('/admin/manage')->with('success', 'ลบสินค้าเสร็จสิ้น');
        } else {
            return view('404');
        }
    }
    public function return()
    {
        $user = Auth::user()->status ?? null;
        if ($user === 'admin') {
            $datas = ReturnProduct::orderBy('id')->get();
            return view('/admin/return', ['datas' => $datas]);
        } else {
            return view('404');
        }
    }
}
