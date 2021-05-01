<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ReturnProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;

class ProductController extends Controller
{

    public function all()
    {
        $datas = Product::where('product_amount', '>', 0)->limit(3)->get();
        return view('User.home', ['data' => $datas]);
    }
    public function index()
    {
        $datas = Product::all();
        return view('User.product', ['data' => $datas]);
    }
    public function show($id)
    {
        $data = Product::find($id);
        $orderDetails = OrderDetail::all();
        $array = [];
        $productArray = [];
        $productDuplicate = [];
        $recommends = [];

        foreach ($orderDetails as $index => $detail) {
            if ($index != 0) {
                $getDetail = OrderDetail::where('order_id', $detail->order_id)->get();
                array_push($array, $getDetail);
            }
        }
        if (!empty($array)) {
            $random_keys = array_rand($array, 1);
            $duplicate = $array[$random_keys];
            if ($duplicate->count()) {
                foreach ($duplicate as  $index => $value) {
                    $product =  Product::where('product_name', $value->product_name)->first();
                    array_push($productArray, $product);
                }
                foreach ($productArray as  $value) {
                    if ($value['product_name'] !== $data->product_name) {
                        array_push($productDuplicate, $value);
                    }
                }
            }
        }
        $recommends = Product::where('product_name', '!=', $data->product_name)->where('product_type', $data->product_type)->limit(3)->get();
        return view('User.product_detail', ['data' => $data, 'recommends' => $recommends, 'duplicate' => $productDuplicate]);
    }
    public function supply()
    {
        $user_id =  Auth::user()->id;
        $datas = Order::where('user_id', $user_id)->get();
        $dataReturn = ReturnProduct::where('user_id', $user_id)->get();
        return view('User.supply', ['datas' => $datas, 'return' => $dataReturn]);
    }
    public function supplydetail(Request $request)
    {
        $datas = OrderDetail::with('order')->where('order_id', $request->id)->get();
        return view('User.supply_detail', ['data' => $datas]);
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $datas = Product::where('product_name', 'like', "%$query%")->orWhere('product_amount', 'like', "%$query%")->orWhere('product_price', 'like', "%$query%")->get();
        return view('User.search-results')->with('data', $datas);
    }
}
