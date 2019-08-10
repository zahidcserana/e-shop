<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\Image;
use App\Model\Product;
use Illuminate\Http\Request;
use Validator;
use DB;

class OrderController extends Controller
{
    public function checkout($cartId){
        $cartItems = array();
        if ($cartId) {
            $cart = DB::table('carts')->where('id', $cartId)->first();
            $cartItems = DB::table('cart_items')->where('cart_id', $cartId)->get();
        }

        foreach ($cartItems as $cartItem) {
            $cartItem->product = Product::find($cartItem->product_id);
            $image = empty($cartItem->product->image_id) == true ? 'product.gif' : Image::find($cartItem->product->image_id)->large; 
           
            if (file_exists('image/products/'.$image)) {
                $cartItem->image = 'image/products/'.$image;
            }else{
               
                $cartItem->image = 'image/products/product.gif';
            }
            
        }
        $data['items'] = $cartItems;
        $data['cart'] = $cart;
        return view('front.orders.checkout', $data);
    }

    public function add(Request $request) {
        if (empty($request->session()->get('cart_id'))) {
            return redirect()->route('/');
        }

        $cartId = $request->session()->get('cart_id');
        $cart = DB::table('carts')->where('id', $cartId)->first();
        $orderInput  = array(
            'quantity' => $cart->quantity,
            'sub_total' => $cart->sub_total,
            'total_payble' => $cart->total_payble,
            'vat' => $cart->vat,
            'discount' => $cart->discount,
            'created_at' => date('Y-m-d H:i:s'),
        );
        $orderId = DB::table('orders')->insertGetid($orderInput);


        $cartItems = DB::table('cart_items')->where('cart_id', $cartId)->get();

        foreach ($cartItems as $item) {
            $itemInput  = array(
                'order_id' => $orderId,
                'quantity' => $item->quantity,
                'sub_total' => $item->sub_total,
                'total_payble' => $item->total_payble,
                'vat' => $item->vat,
                'discount' => $item->discount,
                'created_at' => date('Y-m-d H:i:s'),
            );
            $order = DB::table('order_items')->insertGetid($itemInput);
        }

        return redirect()->route('view_order', ['id' => $orderId]);
    }

    public function view($order){
        
        dd($order);
    }
}