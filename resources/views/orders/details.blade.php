@extends('layouts.master')
@section('include_js')
    @parent
    <script>
    function applyDsicount(value) {
        if (value == '') {
            value = 0;
        }
        let num = parseFloat($("#payble_amount").val()) - parseFloat(value);
        $("#payble").text(num.toFixed(2));
    }
    </script>
@endsection

@section('content')
    
    <!-- END: Subheader -->
    <div class="m-content">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Portlet-->
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
                                <h3 class="m-portlet__head-text">
                                    Order Info
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <div class="m-portlet__body row">
                      <div class="col-4">
                        <table>
                          <tr>
                            <td colspan="2"><h4>Customer Info:</h4></td>
                          </tr>
                          <tr>
                            <td><span class="label-title">Name:</span></td>
                            <td>{{ $order->customer->name ?? '' }}</td>
                          </tr>
                          <tr>
                            <td><span class="label-title">Mobile:</span></td>
                            <td>{{ $order->customer->mobile ?? '' }}</td>
                          </tr>
                          <tr>
                            <td><span class="label-title">Email:</span></td>
                            <td>{{ $order->customer->email ?? '' }}</td>
                          </tr>
                          <tr>
                            <td><span class="label-title">Address:</span></td>
                            <td>{{ $order->customer->address ?? '' }}</td>
                          </tr>
                        </table>
                      </div>
                      <div class="col-4">
                        <table>
                          <tr>
                            <td colspan="2"><h4>Order Info:</h4></td>
                          </tr>
                          <tr>
                            <td><span class="label-title"> Code:</span></td>
                            <td>{{ $order->code }}</td>
                          </tr>
                          <tr>
                            <td><span class="label-title"> Status:</span></td>
                            <td>{{ $order->order_status }}</td>
                          </tr>
                          <tr>
                            <td><span class="label-title">Payment:</span></td>
                            <td>{{ $order->payment }}</td>
                          </tr>
                          <tr>
                            <td><span class="label-title">Date:</span></td>
                            <td>{{ $order->created_at->format('M j, Y, g:i a') }}</td>
                          </tr>
                        </table>
                      </div>
                      <div class="col-4">
                        <table>
                          <tr>
                            <td colspan="2"><h4>{{ \config('myConfig.company_name') }}</h4></td>
                          </tr>
                          <tr>
                            <td colspan="2"><span>{{ \config('myConfig.company_email') }}</span></td>
                          </tr>
                          <tr>
                            <td colspan="2"><span>{{ \config('myConfig.company_mobile') }}</span></td>
                          </tr>
                          <tr>
                            <td colspan="2"><span>{{ \config('myConfig.company_phone') }}</span></td>
                          </tr>
                          <tr>
                            <td colspan="2"><span>{{ \config('myConfig.company_address') }}</span></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                    <div class="m-form" name="data-form">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row"  style="font-weight: bold">
                                <div for="example-text-input" class="col-3 col-form-label">
                                    Product
                                </div>
                                <div for="example-text-input" class="col-2 col-form-label">
                                    Quantity
                                </div>
                                <div for="example-text-input" class="col-2 col-form-label">
                                    Unit Price
                                </div>
                                <div for="example-text-input" class="col-2 col-form-label">
                                    Sub Total
                                </div>
                                <div for="example-text-input" class="col-2 col-form-label">
                                    Amount
                                </div>
                            </div>
                            @foreach($items as $item)
                                <div class="form-group m-form__group row">
                                    <div class="col-3">
                                        {{ $item->product->name }}
                                        <input class="form-control m-input" type="hidden" value="{{ $item->id }}"
                                               id="item_id" name="item_id">
                                    </div>

                                    <div class="col-2">
                                      <span style="text-align: center">{{ $item->quantity }}</span>
                                    </div>

                                    <div class="col-2">
                                        <span>{{ $item->unit_price }}</span>
                                    </div>

                                    <div class="col-2">
                                      <span>{{ $item->sub_total }}</span>
                                    </div>
                                    <div class="col-2">
                                        <span>{{ $item->total_payble }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                      <div class="col-6">
                      </div>
                      <div class="col-6">
                          <form class="m-form"  name="data-form" method="POST" action="{{route('order_edit',$order['id'])}}">
                            {{ csrf_field() }}
                            <div class="m-portlet__body">
                                <input type="hidden" id="userId" value="{{$order['id']}}">

                                <div class="form-group m-form__group row">
                                  <div class="col-6">
                                      <span class="label-title">Sub Total:</span>
                                  </div>
                                  <div class="col-2">
                                      <h5 class="mb-0 float-right">
                                        {{ number_format($order->sub_total, 2) }} <small>&#2547;</small>
                                      </h5>
                                  </div>
                                </div>
                                <div class="form-group m-form__group row">
                                  <div class="col-6">
                                      <span class="label-title">Discount:</span>
                                  </div>
                                  <div class="col-2">
                                      <input onkeyup="applyDsicount(this.value)" class="form-control m-input" type="text" name="discount" value="{{ $order->discount }}">
                                  </div>
                                </div>
                                <div class="form-group m-form__group row">
                                  <div class="col-6">
                                      <span class="label-title">Payble:</span>
                                  </div>
                                  <div class="col-2">
                                    <input type="hidden" id="payble_amount" value="{{ $order->total_payble ?? 0 }}">
                                    <h5 class="mb-0 float-right" id="payble">
                                        {{ number_format($order->total_payble, 2) }} <small>&#2547;</small>
                                    </h5>
                                  </div>
                                </div>
                                <div class="form-group m-form__group row">
                                  <div class="col-6">
                                      <span class="label-title">Status:</span>
                                  </div>
                                  <div class="col-2">
                                    <select class="form-control m-input m-input--air" name="order_status" style="width: 100%;">
                                      @foreach($orderStatus as $k=>$v)
                                      <option {{ $k == $order->order_status ? 'selected = "selected"':'' }} value='{{ $k }}'>{{ $v }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group m-form__group row">
                                  <div class="col-6">
                                      <span class="label-title">Payment:</span>
                                  </div>
                                  <div class="col-2">
                                    <select class="form-control m-input m-input--air" name="payment" style="width: 100%;">
                                      @foreach($paymentStatus as $k=>$v)
                                      <option {{ $k == $order->payment ? 'selected = "selected"':'' }} value='{{ $k }}'>{{ $v }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions m-form__actions">
                                    <div class="row">
                                        <div class="col-lg-3"></div>
                                        <div class="col-lg-6">
                                            <button type="submit" class="btn btn-success">
                                                Submit
                                            </button>
                                            <a class="btn btn-secondary" href="{{route('orders')}}">Back</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </form>
                      </div>
                    </div>
                    <!--end::Form-->
                </div>
                <!--end::Portlet-->
            </div>
        </div>
    </div>

@endsection
