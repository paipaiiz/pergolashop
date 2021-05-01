<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Alert;
use App\Models\OrderDetail;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function index()
    {
        return redirect()->back()->with('success', 'IT WORKS!');
    }
    public function store(Request $request)
    {
        $datas = $request->validate([
            'shipping_fullname' => 'required',
            'shipping_house_number' => 'required',
            'shipping_district' => 'required',
            'shipping_amphore' => 'required',
            'shipping_province' => 'required',
            'shipping_postal_code' => 'required',
            'shipping_tel' => 'required',
            'payment_type' => 'required',
        ]);
        $datas['code'] = Str::random(10);
        $data['slip_payment'] = $request->slip_payment;
        $data['shipping_note'] = 'ไม่มี';
        $datas['date'] = Carbon::now()->isoFormat('DD/MM/YYYY');
        $datas['user_id'] = auth()->id();
        $datas['total_price'] = \Cart::session(auth()->id())->getTotal();
        $items = \Cart::session(auth()->id())->getContent();
        $datas['product_count'] = 0;
        foreach ($items as $item) {
            $datas['product_count'] += $item->quantity;
        }
        $datas['status'] = 'รอการยืนยัน';
        if ($request->hasFile('slip_payment')) {
            $datas['slip_payment'] = $request->slip_payment->store('images', 'public');
        }
        $order = Order::create($datas);
        // // save order detail
        $cartItems = \Cart::session(auth()->id())->getContent();
        $order_data = [];
        foreach ($cartItems as $item) {
            $order_data['order_id'] =  $order->id;
            $order_data['product_id'] = $item->id;
            $order_data['product_name'] = $item->name;
            $order_data['product_price'] = $item->price;
            $order_data['quantity'] = $item->quantity;
            $order_data['total_price'] = \Cart::session(auth()->id())->get($item->id)->getPriceSum();
            OrderDetail::create($order_data);
            $test = Product::where('products.product_name', $item->name)->first();
            $quentity1 = $test->product_amount - $item->quantity;
            Product::find($item->id)->update(['product_amount' => $quentity1]);
        }
        // empty cart
        \Cart::session(auth()->id())->clear();

        return redirect('/home')->with('success', 'ทำรายการสั่งซื้อสินค้าสำเร็จ');
    }

    public function update($id, Request $request)
    {
        Order::where('id', $id)->update(['status' => $request->status]);
        if ($request->status === 'ยกเลิก') {
            $getDetails =  OrderDetail::where('order_id', $id)->get();
            foreach ($getDetails as  $detail) {
                $product = Product::where('id', $detail->product_id)->first();
                $product->product_amount += $detail->quantity;
                Product::where('id', $detail->product_id)->update(['product_amount' => $product->product_amount]);
            }
        }
        return redirect('/admin/order')->with('success', 'IT WORKS!');
    }
    public function supply($id, Request $request)
    {
        $test = Order::where('id', $id)->update(['supply_number' => $request->supply_number]);
        return redirect()->back()->with('success', 'บันทึกเลขพัสดุเสร็จสิ้น');
    }
    public function thaipostapi(Request $request)
    {
        $supplyNumber = $request->supplyNumber;
        $response = Http::withHeaders([
            'Authorization' => 'Token TXCyBpCGF%Y~WzIYI*M!TRKXL%GMZ3C6H6JhQXZcANRtTIX1D%BtCnNMYYD5T7HJJ3P^V+S.KHK6WaBFH_K0WxB4PHXIMuQ%ISFR',
            'Content-Type' => 'application/json'
        ])->post('https://trackapi.thailandpost.co.th/post/api/v1/authenticate/token');
        $getResponse = Http::withHeaders([
            'Authorization' => 'Token ' . $response['token'],
            'Content-Type' => 'application/json'
        ])->post('https://trackapi.thailandpost.co.th/post/api/v1/track', [
            "status" => "all",
            "language" => "TH",
            "barcode" => [
                $supplyNumber
            ]
        ]);
        $supplyData = $getResponse['response']['items'][$supplyNumber];
        // foreach ($getResponse['response']['items']['$supplyNumber'] as $key => $item) {
        //     echo $item['status_description'] . '->';
        // }
        return $supplyData;
    }
    public function note($id, Request $request)
    {
        $test = Order::where('id', $id)->update(['order_note' => $request->order_note]);
        return redirect('/admin/order')->with('success', 'เพิ่มหมายเหตุสำเร็จ');
    }
    public function print(Request $request)
    {
        $date = $request->date ?? Carbon::now()->isoFormat('DD/MM/YYYY');
        $getOrder = Order::where('date', $date)->where('status', '!=', 'ยกเลิก')->with('user')->get();
        $count = $getOrder->count();
        $sumPrice = 0;
        foreach ($getOrder as $value) {
            $sumPrice += $value->total_price;
        }
        return view('admin.print', ['data' => $getOrder, 'date' =>  $date, 'count' => $count, 'sumPrice' => $sumPrice]);
    }
}
