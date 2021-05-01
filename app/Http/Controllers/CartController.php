<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Product $product)
    {
        $checkOrder = \Cart::session(auth()->id())->getContent();
        // add the product to cart
        if (in_array($product->id, array_column($checkOrder->toArray(), 'id')) !== true) {
            \Cart::session(auth()->id())->add(array(
                'id' => $product->id,
                'name' => $product->product_name,
                'price' => $product->product_price,
                'quantity' => 1,
                'attributes' => array(),
                'associatedModel' => $product
            ));
        }
        return redirect()->back();
    }
    public function index()
    {
        $cartItems = \Cart::session(auth()->id())->getContent();
        return view('cart.index', compact('cartItems'));
    }
    public function destroy($id)
    {
        \Cart::session(auth()->id())->remove($id);
        return back();
    }
    public function update($id, $value)
    {
        \Cart::session(auth()->id())->update(
            $id,
            [
                'quantity' =>
                [
                    'relative' => false,
                    'value' => $value
                ]
            ]
        );
        return back();
    }
    public function checkout()
    {
        return view('cart.checkout');
    }
}
