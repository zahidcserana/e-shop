<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\Product;
use App\Model\Image;
use DB;

class OrderController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  /** Order List */
  public function index() {
    $data = array();
    return view('orders.index', $data);
  }
  public function orderList()
  {
      $orders = DB::table('orders')->orderBy('id', 'DESC')->get();
      // dd($orders);
      foreach ($orders as $order) {
          $orderId = $order->id;
          $order->customer = DB::table('customers')->where('id', $order->customer_id)->first();
          $order->id = '<a href="/orders/' . $order->id . '/details">' . $order->id . '</a>';
          $order->status = $order->order_status;

          $order->actions =  '
             <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown">
                 Action <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="/orders/' . $orderId . '/details">Edit</a></li>
                  <li><a href="/orders/' . $orderId . '/delete">Delete</a></li>
                </ul>
              </div>
        ';
      }
      $data['orders'] = $orders;

      echo json_encode($orders);
  }

  /** Order details */
  public function details($orderId)
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
      return view('orders.details', $data);
  }

  public function delete($id)
  {
      DB::table('orders')->where('id', $id)->delete();
      return redirect('order-all')->with('status', 'Successfully Deleted');
  }
}
