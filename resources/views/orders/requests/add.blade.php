@extends('layouts.master')
@section('include_js')
    @parent

@endsection
@section('content')
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Order Requests
                </h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                        <a href="#" class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon la la-home"></i>
                        </a>
                    </li>
                    <li class="m-nav__separator">
                        -
                    </li>
                    <li class="m-nav__item">
                        <a href="{{route('order_requests')}}" class="m-nav__link">
											<span class="m-nav__link-text">
												Order Requests
											</span>
                        </a>
                    </li>
                    <li class="m-nav__separator">
                        -
                    </li>
                    <li class="m-nav__item">
                        <a href="{{ route('order_request_new') }}" class="m-nav__link">
											<span class="m-nav__link-text">
												New
											</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
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
      <form class="m-form" name="product-form" method="POST" action="{{route('order_request_add')}}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
          <div class="col-lg-6">
            <div class="m-portlet">
              <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                  <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon m--hide">
                      <i class="la la-gear"></i>
                    </span>
                    <h3 class="m-portlet__head-text">
                      Products info
                    </h3>
                  </div>
                </div>
              </div>
              <!--begin::Form-->
                <div class="m-portlet__body">
                  <div class="m-form__section m-form__section--first">
                    <div class="form-group m-form__group row">
                      <label class="col-lg-3 col-form-label">
                        Category:
                      </label>
                      <div class="col-lg-6">
                        <select class="form-control m-input m-input--air" id="category_id" name="category_id" onchange="getSubCategory(this.value)" value="{{ old('category_id') }}">
                            <option value="">Select Category</option>
                            @foreach($categories as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                        </select>
                        <span class="m-form__help">
                          Please select a Category
                        </span>
                      </div>
                    </div>
                    <div class="form-group m-form__group row">
                      <label class="col-lg-3 col-form-label" id="sub_cat_lebel">
                          Condition:
                      </label>
                      <div id="sub_cat_list" class="col-lg-6" style="display: none;">
                        <select class="form-control m-input m-input--air" id="sub_category_id" name="sub_category_id">
                            <option value="">Select One</option>
                            @foreach($sub_categories as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                        </select>
                        <span class="m-form__help">
                          Please select a Condition
                        </span>
                      </div>
                    </div>
                    <div class="form-group m-form__group row">
                      <label class="col-form-label col-lg-3 col-sm-12">
                        Date of Requirement:
                      </label>
                      <div class="col-lg-6 ">
                        <input type="text" name="required_date" class="form-control" id="m_datepicker_1" readonly="" placeholder="Select date">
                        <span class="m-form__help">
                          Please select date of requirement
                        </span>
                      </div>
                    </div>
                    <div class="form-group m-form__group row">
                      <label class="col-form-label col-lg-3 col-sm-12">
                        Description:
                      </label>
                      <div class="col-lg-6 ">
                        <textarea name="description" class="form-control md-input"
                                  data-provide="markdown" rows="10" style="resize: none;"
                                  aria-describedby="markdown-error" aria-invalid="false" value="{{ old('description') }}">
                        </textarea>
                      </div>
                    </div>
                    <div id="m_repeater_2">
                      <div class="form-group  m-form__group row">
                        <label  class="col-lg-3 col-form-label">
                          Image:
                        </label>
                        <div data-repeater-list="" class="col-lg-9">
                          <div data-repeater-item class="row m--margin-bottom-10">
                            <div class="col-lg-5">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="flaticon-multimedia-2"></i>
                                  </span>
                                </div>
                                <input type="file" name="file[]" id="file" class="form-control form-control-danger">
                              </div>
                            </div>
                            <div class="col-lg-2">
                              <a href="#" data-repeater-delete="" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only">
                                <i class="la la-remove"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col">
                          <div data-repeater-create="" class="btn btn btn-primary m-btn m-btn--icon">
                            <span>
                              <i class="la la-plus"></i>
                              <span>
                                Add
                              </span>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <!--end::Form-->
            </div>
          </div>
          <div class="col-lg-6">
            <div class="m-portlet">
              <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                  <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon m--hide">
                      <i class="la la-gear"></i>
                    </span>
                    <h3 class="m-portlet__head-text">
                      Customer Info
                    </h3>
                  </div>
                </div>
              </div>
              <!--begin::Form-->
                <div class="m-portlet__body">
                  <div class="m-form__section m-form__section--first">
                    <div class="form-group m-form__group row">
                      <label class="col-lg-3 col-form-label">
                        Full Name:
                      </label>
                      <div class="col-lg-6">
                        <input type="text" name="name" class="form-control m-input" placeholder="Enter full name" value="{{ old('name') }}">
                        <span class="m-form__help">
                          Please enter your full name
                        </span>
                      </div>
                    </div>
                    <div class="form-group m-form__group row">
                      <label class="col-lg-3 col-form-label">
                        Email address:
                      </label>
                      <div class="col-lg-6">
                        <input type="email" name="email" class="form-control m-input" placeholder="Email" value="{{ old('email') }}">
                        <span class="m-form__help">
                          Please enter your valid email
                        </span>
                      </div>
                    </div>
                    <div class="form-group m-form__group row">
                      <label class="col-lg-3 col-form-label">
                        Mobile:
                      </label>
                      <div class="col-lg-6">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="la la-phone"></i>
                            </span>
                          </div>
                          <input type="text" name="mobile" class="form-control form-control-danger" placeholder="Mobile" value="{{ old('mobile') }}">
                        </div>
                        <span class="m-form__help">
                          Please enter your mobile number
                        </span>
                      </div>
                    </div>
                    <div class="form-group m-form__group row">
                      <label class="col-lg-3 col-form-label">
                        Phone:
                      </label>
                      <div class="col-lg-6">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="la la-phone"></i>
                            </span>
                          </div>
                          <input type="text" name="phone" class="form-control form-control-danger" placeholder="Phone" value="{{ old('phone') }}">
                        </div>
                      </div>
                    </div>
                    <div class="form-group m-form__group row">
                      <label class="col-lg-3 col-form-label">
                        Address:
                      </label>
                      <div class="col-lg-6">
                        <input type="text" name="address" class="form-control m-input" placeholder="Address" value="{{ old('address') }}">
                        <span class="m-form__help">
                          Please enter your full address
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row" style="padding-left: 40%;">
                  <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions">
                      <div class="row">
                        <div class="col-lg-6">
                          <button type="submit" class="btn btn-accent m-btn m-btn--pill m-btn--air">
                            Submit
                          </button>
                        </div>
                        <div class="col-lg-6">
                          <button type="reset" class="btn btn-secondary m-btn m-btn--pill m-btn--air">
                            Cancel
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div
              <!--end::Form-->
            </div>
          </div>
        </div>
      </form>
    </div>

@endsection

@section('footer')
<script src="{{ asset('assets/app/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/app/js/form-repeater.js') }}" type="text/javascript"></script>
    @parent
@endsection
