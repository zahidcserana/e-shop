<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\Image;
use App\Model\Product;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\Events\OrderShipped;
use App\Model\Order;

class OrderController extends Controller
{
    public function checkout($cartId)
    {
        $cartItems = array();
        if ($cartId) {
            $cart = DB::table('carts')->where('id', $cartId)->first();
            $cartItems = DB::table('cart_items')->where('cart_id', $cartId)->get();
        }

        foreach ($cartItems as $cartItem) {
            $cartItem->product = Product::find($cartItem->product_id);
            $image = empty($cartItem->product->image_id) == true ? 'product.gif' : Image::find($cartItem->product->image_id)->large;

            if (file_exists('image/products/' . $image)) {
                $cartItem->image = 'image/products/' . $image;
            } else {

                $cartItem->image = 'image/products/product.gif';
            }
        }
        $data['items'] = $cartItems;
        $data['cart'] = $cart;
        return view('front.orders.checkout', $data);
    }

    public function add(Request $request)
    {
        if (empty($request->session()->get('cart_id'))) {
            return redirect()->route('home_page');
        }
        $cartId = $request->session()->get('cart_id');
        $cart = DB::table('carts')->where('id', $cartId)->first();
        $data = $request->except('token');
        $customerId = $this->customerInfo($data);
        $orderInput  = array(
            'quantity' => $cart->quantity,
            'sub_total' => $cart->sub_total,
            'total_payble' => $cart->total_payble,
            'vat' => $cart->vat,
            'discount' => $cart->discount,
            'created_at' => date('Y-m-d H:i:s'),
            'customer_id' => $customerId,
        );
        $orderId = DB::table('orders')->insertGetid($orderInput);
        Order::find($orderId)->update(['code'=>generateInvoiceNo($orderId)]);
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
                'product_id' => $item->product_id,
                'unit_price' => $item->unit_price,
            );
            $order = DB::table('order_items')->insertGetid($itemInput);
        }
        $order = Order::findOrFail($orderId);

        event(new OrderShipped($order));
        $request->session()->forget('cart_id');

        return redirect()->route('view_order', ['id' => $orderId]);
    }

    // public function customerInfo($data)
    // {
    //     $customer = DB::table('customers')->where('mobile', $data['mobile'])->first();
    //     if (!empty($customer))
    //         return $customer->id;
    //     $customerInput = array(
    //         'name' => $data['name'],
    //         'mobile' => $data['mobile'],
    //         'email' => $data['email'],
    //         'address' => $data['address'],
    //         'created_at' => date('Y-m-d H:i:s'),
    //     );
    //     $customerId = DB::table('customers')->insertGetid($customerInput);
    //     return $customerId;
    // }

    public function view($orderId)
    {
        $order = Order::findOrFail($orderId);

        $orderItems = array();
        if (empty($order)) {
            return redirect()->route('home_page');
        }

        $orderItems = DB::table('order_items')->where('order_id', $orderId)->get();

        foreach ($orderItems as $item) {
            $item->product = Product::find($item->product_id);
            $image = empty($item->product->image_id) == true ? 'product.gif' : Image::find($item->product->image_id)->large;

            if (file_exists('image/products/'.$image)) {
                $item->image = '/image/products/'.$image;
            }else{

                $item->image = '/image/products/product.gif';
            }

        }
        $data['items'] = $orderItems;
        $data['order'] = $order;
        // dd($data);
        return view('front.orders.view', $data);
    }
}
