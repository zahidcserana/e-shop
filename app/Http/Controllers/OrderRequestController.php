<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\Product;
use App\Model\Image;
use DB;
use Validator;
use Session;

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
                  <li><a href="/order-requests/' . $orderId . '">View</a></li>
                  <li><a href="/order-requests/' . $orderId . '/delete">Delete</a></li>
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
    dd($data);
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
        'required_date' => $data['required_date'] ?? '0000-00-00',
        'customer_id' => $this->customerInfo($data),
        'created_at' => date('Y-m-d H:i:s')
    );
    DB::table('request_orders')->insert($input);

    /** Upload image start */

    if ($request->hasFile('file'))
    {
          $user = $request->auth;
          $file      = $request->file('file');
          $filename  = $file->getClientOriginalName();
          $extension = $file->getClientOriginalExtension();
          $picture   = $user->pharmacy_branch_id.date('YmdHis').'-'.$extension;

          $dir = 'assets/prescription_image/'. $picture;
          $file->move('assets/prescription_image', $picture);

          $im = file_get_contents($dir);
          $uploded_image_file_bytecode = base64_encode($im);

          $cartModel = new Cart();
          $checkFile = $cartModel->where('token', $request->token)->whereNotNull('file_name')->first();
          // return response()->json(["message" => $checkFile]);

          if($checkFile && file_exists('assets/prescription_image/'. $checkFile->file_name)){
            unlink('assets/prescription_image/'. $checkFile->file_name);
          }

          $cartData = $cartModel->where('token', $request->token)->update(['file' => $uploded_image_file_bytecode, 'file_name' => $picture]);

          return response()->json(['success'=>true, "file_name" => $picture]);
    } else
    {
          return response()->json(["message" => "Select image first."]);
    }
    /** Upload image end */

    return redirect()->route('order_requests');
  }
  /** New Order Request End*/
  /** Order details */
  public function view($orderId)
  {
      $order = DB::table('request_orders')->where('id', $orderId)->first();
      if (empty($order)) {
          return redirect()->route('home_page');
      }
      $categories = DB::table('categories')->get();
      $subCategories = DB::table('sub_categories')->where('category_id', $order->category_id)->get();

      $data['categories'] = $categories;
      $data['sub_categories'] = $subCategories;
      $data['order'] = $order;
      $data['customer'] = DB::table('customers')->where('id', $order->customer_id)->first();
      // dd($order->description);
      return view('orders.requests.view', $data);
  }

  public function update($id, Request $request)
  {
      $order = DB::table('request_orders')->where('id', $id)->first();
      if (empty($order)) {
          return redirect()->route('home_page');
      }
      $data = $request->except('_token');
      $data['updated_at'] = date('Y-m-d H:i:s');
      /** Order update */
      $orderData = array('category_id', 'sub_category_id', 'description', 'required_date');
      $orderInput = array();
      foreach ($orderData as $key) {
        if (array_key_exists($key, $data)) {
          $orderInput[$key] = $data[$key];
        }
      }
      if (!DB::table('request_orders')->where('id', $id)->update($orderInput)) {
        return redirect()->back()->withErrors(['Something went wrong! Order info not updated.']);
      }
      /** Customer update */
      $customerData = array('name', 'email', 'mobile', 'phone', 'address');
      $customerInput = array();
      foreach ($customerData as $key) {
        if (array_key_exists($key, $data)) {
          $customerInput[$key] = $data[$key];
        }
      }
      if (!DB::table('customers')->where('id', $order->customer_id)->update($customerInput)) {
        return redirect()->back()->withErrors(['Something went wrong! Customer info not updated.']);
      }
      Session::flash('message', "Successfully updated.");
      return redirect()->back();
  }

  public function delete($id)
  {
      DB::table('request_orders')->where('id', $id)->delete();
      Session::flash('status', "Successfully Deleted.");
      return redirect()->back();
  }

  public function uploadimage(Request $request)
  {
  }
}
