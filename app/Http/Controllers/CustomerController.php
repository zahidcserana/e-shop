<?php

namespace App\Http\Controllers;

use App\Model\Customer;
use App\Model\Order;
use DB;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $data = array();
    return view('customers.index', $data);
  }

  public function customerList(Request $request)
  {
    $query = $request->query('query');

    $conditions = array();

    if (isset($query['name']) && !empty($query['name'])) {
      $conditions = array_merge(array(['name', 'LIKE', '%' . $query['name'] . '%']), $conditions);
    }
    if (isset($query['email']) && !empty($query['email'])) {
      $conditions = array_merge(array(['email', 'LIKE', '%' . $query['email'] . '%']), $conditions);
    }
    if (isset($query['status']) && !empty($query['status'])) {
      $conditions = array_merge(array(['status', 'LIKE', '%' . $query['status'] . '%']), $conditions);
    }
    if (isset($query['mobile']) && !empty($query['mobile'])) {
      $conditions = array_merge(array(['mobile', 'LIKE', '%' . $query['mobile'] . '%']), $conditions);
    }
    $items = DB::table('customers')->where($conditions)->orderBy('id', 'desc')->get();

    foreach ($items as $i => $item) {
      $item->serial = $i;
      $itemId = $item->id;
      $item->name = '<a href="/customers/' . $item->id . '">' . $item->name . '</a>';
      $item->status = $item->status;

      $item->actions = '
             <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown">
                 Action <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="/customers/' . $itemId . '">View</a></li>
                  <li><a class="delete" href="/customers/' . $itemId . '">Delete</a></li>
                </ul>
              </div>
        ';
    }
    $data['items'] = $items;

    echo json_encode($items);
  }

  public function view($id)
  {
    $object = DB::table('customers')->find($id);

    $order = Order::where('customer_id', $id)->get();

    $data['object'] = $object;
    $data['summary'] = array(
      'count' => $order->count(),
      'sub_total' => $order->sum('sub_total'),
      'discount' => $order->sum('discount'),
      'payable' => $order->sum('total_payble'),
      'due' => $order->sum('due'),
    );
    return view('customers.view', $data);
  }

  public function update($id, Request $request)
  {
    $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      // 'mobile' => ['required', 'string', 'max:255', 'unique:users'],
      'image' => ['mimes:jpeg,png,jpg,bmp|max:2048'],
    ]);
    $data = $request->except('_token');
    $data['updated_at'] = date('Y-m-d H:i:s');
    $item = Customer::find($id);

    // if ($request->hasFile('cust_owner_profile_image'))
    // {
    //   $data['cust_owner_profile_image'] = imageUpload($request->file('cust_owner_profile_image'), $this->imagePath, $request->id . '_profile_');
    //   unlinkImage($item->cust_owner_profile_image, $this->imagePath);
    // }

    $item->update($data);
    return redirect('customers/' . $id)->with('status', 'Data successfully saved.');
  }
}
