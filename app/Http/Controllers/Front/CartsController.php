<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\Image;
use App\Model\Product;
use Illuminate\Http\Request;
use Validator;
use DB;

class CartsController extends Controller
{
    public function addToCart(Request $request)
    {
        $data = $request->except('_token');
        if ($request->session()->get('cart_id')) {
            $cartId = $request->session()->get('cart_id');
        } else {
            $cartInput = array(
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );
            $cartId = DB::table('carts')->insertGetid($cartInput);
            $request->session()->put('cart_id', $cartId);
        }
        $input = array(
            'cart_id' => $cartId,
            'product_id' => $data['product_id'],
            'unit_price' => $data['price'],
            'sub_total' => $data['price'] * 1,
            'quantity' => empty($data['quantity']) == true ? 1 : $data['quantity'],
        );

        DB::table('cart_items')->insert($input);
        $this->_updateCart($cartId);

        echo json_encode(array('success' => true));
    }

    public function updateCart(Request $request)
    {
        $data = $request->except('_token');
        $cartItem = DB::table('cart_items')->where('id', $data['item_id'])->first();
        $quantity = $data['increment'] == 'true' ? $cartItem->quantity + 1 : $cartItem->quantity - 1;
        $price = $cartItem->unit_price * $quantity;
        $input = array(
            'quantity' => $quantity,
            'sub_total' => $price,
        );
        DB::table('cart_items')->where('id', $data['item_id'])->update($input);
        $this->_updateCart($cartItem->cart_id);
        $item = DB::table('cart_items')->where('id', $data['item_id'])->first();

        echo json_encode(array('success' => true, 'data' => $item, 'cart' => DB::table('carts')->where('id', $cartItem->cart_id)->first()));
    }
    public function removeCartItem($itemId)
    {
        $cartItem = DB::table('cart_items')->where('id', $itemId)->first();
        $cartId = $cartItem->cart_id;
        DB::table('cart_items')->where('id', $itemId)->delete();
        $this->_updateCart($cartId);

        echo json_encode(array('success' => true, 'cart' => DB::table('carts')->where('id', $cartItem->cart_id)->first()));
    }

    private function _updateCart($cartId)
    {
        $cartItems = DB::table('cart_items')
            ->select(DB::raw('SUM(sub_total) as sub_total,SUM(discount) as discount,SUM(quantity) as quantity'))
            ->where('cart_id', $cartId)
            ->first();
        $input = array(
            'quantity' => $cartItems->quantity,
            'sub_total' => $cartItems->sub_total,
            'discount' => $cartItems->discount,
            'total_payble' => $cartItems->sub_total - $cartItems->discount,
        );
        DB::table('carts')->where('id', $cartId)->update($input);

        return;
    }

    public function viewCart(Request $request)
    {
        $cartItems = array();
        if (empty($request->session()->get('cart_id'))) {
            return redirect()->route('home_page');
        }

        $cartId = $request->session()->get('cart_id');
        $cart = DB::table('carts')->where('id', $cartId)->first();
        $cartItems = DB::table('cart_items')->where('cart_id', $cartId)->get();

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
        return view('front.products.view_cart', $data);
    }
}
