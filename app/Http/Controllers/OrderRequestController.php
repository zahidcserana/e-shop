<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\Product;
use App\Model\Image;
use DB;
use Validator;

class OrderRequestController extends Controller
{
  /** Order List */
  public function index() {
    $data = array();
    return view('orders.requests.index', $data);
  }
  public function orderList()
  {
      $orders = DB::table('request_orders')->orderBy('id', 'DESC')->get();
      // dd($orders);
      foreach ($orders as $order) {
          $orderId = $order->id;
          $order->customer = DB::table('customers')->where('id', $order->customer_id)->first();
          $order->id = '<a href="/request_orders/' . $order->id . '/details">' . $order->id . '</a>';
          $order->status = $order->status;

          $order->actions =  '
             <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown">
                 Action <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="/request_orders/' . $orderId . '/details">Edit</a></li>
                  <li><a href="/request_orders/' . $orderId . '/delete">Delete</a></li>
                </ul>
              </div>
        ';
      }
      $data['orders'] = $orders;

      echo json_encode($orders);
  }

  /** New Order Request Start*/
  public function new() {
    $categories = DB::table('categories')->get();
    $subCategories = DB::table('sub_categories')->get();

    $data['categories'] = $categories;
    $data['sub_categories'] = $subCategories;

    return view('orders.requests.add', $data);
  }

  public function add(Request $request) {
    $data = $request->except('_token');
    $rules = [
        'description' => 'required',
        'mobile' => 'required',
    ];
    $validator = Validator::make($data, $rules);
    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput($request->input());
    }
    $input = array(
        'description' => strip_tags($data['description']),
        'category_id' => $data['category_id'],
        'sub_category_id' => $data['sub_category_id'],
        'required_date' => $data['required_date'] ? date('Y-m-d', strtotime($data['required_date'])) : '0000-00-00',
        'customer_id' => $this->customerInfo($data),
        'created_at' => date('Y-m-d H:i:s')
    );
    DB::table('request_orders')->insert($input);

    return redirect()->route('order_requests');
  }
  /** New Order Request End*/
}
