<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\Product;
use App\Model\Image;
use DB;
use PDF;

class OrderController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  /** Order List */
  public function index()
  {
    $data = array();
    return view('orders.index', $data);
  }
  public function orderList(Request $request)
  {
    $query = $request->query('query');

    $conditions = array();

    if (!empty($query['code'])) {
      $conditions = array_merge(array(['orders.code', 'LIKE', '%' . $query['code'] . '%']), $conditions);
    }
    if (!empty($query['status'])) {
      $conditions = array_merge(array(['orders.order_status', 'LIKE', $query['status']]), $conditions);
    }

    $orders = DB::table('orders')->where($conditions)->orderBy('id', 'DESC')->get();
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
                  <li><a href="/orders/' . $orderId . '/details">View</a></li>
                  <li><a class="delete" href="/orders/' . $orderId . '/delete">Delete</a></li>
                </ul>
              </div>
        ';
    }
    $data['orders'] = $orders;

    echo json_encode($orders);
  }

  public function downloadPDF(Request $request)
  {
    $order = $request->session()->get('order');
    $pdf = PDF::loadView('order.pdf', compact('order'))->setPaper('a4', 'portrait');

    return $pdf->download('orders.pdf');
  }

  /** Order details */
  public function details($orderId, Request $request)
  {
    $order = Order::findOrFail($orderId);
    $orderItems = array();
    if (empty($order)) {
      return redirect()->route('home_page');
    }
    $order->paid_amount = $order->total_payble - $order->due;
    $orderItems = DB::table('order_items')->where('order_id', $orderId)->get();

    foreach ($orderItems as $item) {
      $item->product = Product::find($item->product_id);
      $image = empty($item->product->image_id) == true ? 'product.gif' : Image::find($item->product->image_id)->large;

      if (file_exists('image/products/' . $image)) {
        $item->image = '/image/products/' . $image;
      } else {

        $item->image = '/image/products/product.gif';
      }
    }
    $request->session()->put('order', $order);

    $order->customer;
    $data['items'] = $orderItems;
    $data['orderStatus'] = \config('myConfig.order_status');
    $data['paymentStatus'] = \config('myConfig.payment_status');
    $data['order'] = $order;
    return view('orders.details', $data);
  }

  public function edit($id, Request $request)
  {
    $data = $request->except('_token');
    $order = Order::find($id);
    if ($order->payment != 'PAID') {
      $data['paid'] = $order->paid + $data['paid'];
      $data['total_payble'] = $order->sub_total - $data['discount'];
      $data['due'] = $data['total_payble'] - $data['paid'];
      if ($data['due'] == 0) {
        $data['payment'] = 'PAID';
      } else if ($data['due'] == $data['total_payble']) {
        $data['payment'] = 'UNPAID';
      } else if ($data['due'] < $data['total_payble']) {
        $data['payment'] = 'PARTIAL_PAID';
      }
    }
    $order->update($data);

    return redirect()->route('order_details', $id)->with('status', 'Data successfully saved!');
    // return redirect()->route($this->routeName)->with('error','Not found!');
  }

  public function delete($id)
  {
    DB::table('orders')->where('id', $id)->delete();
    return redirect('order-all')->with('status', 'Successfully Deleted');
  }
}
