@extends('layouts.master')
@section('include_js')
    @parent

@endsection
@section('content')
<div class="m-content">
  <div class="row">
    <div class="col-xl-3 col-lg-4">
      <div class="m-portlet m-portlet--full-height  ">
        <div class="m-portlet__body">
          <div class="m-card-profile">
            <div class="m-card-profile__title m--hide">
              Your Profile
            </div>
            <div class="m-card-profile__pic">
              <div class="m-card-profile__pic-wrapper">
                <img src="{{ asset('img/user.png') }}" alt=""/>
              </div>
            </div>
            <div class="m-card-profile__details">
              <span class="m-card-profile__name">
                {{ $object->name }}
              </span>
              <a href="" class="m-card-profile__email m-link">
                {{ $object->email }}
              </a>
            </div>
          </div>
          <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
            <li class="m-nav__separator m-nav__separator--fit"></li>
            <li class="m-nav__section m--hide">
              <span class="m-nav__section-text">
                Section
              </span>
            </li>
            <li class="m-nav__item">
              <a href="../header/profile&amp;demo=default.html" class="m-nav__link">
                <i class="m-nav__link-icon flaticon-profile-1"></i>
                <span class="m-nav__link-title">
                  <span class="m-nav__link-wrap">
                    <span class="m-nav__link-text">
                      My Profile
                    </span>
                    <span class="m-nav__link-badge">
                      <span class="m-badge m-badge--success">
                        2
                      </span>
                    </span>
                  </span>
                </span>
              </a>
            </li>
            <li class="m-nav__item">
              <a href="../header/profile&amp;demo=default.html" class="m-nav__link">
                <i class="m-nav__link-icon flaticon-share"></i>
                <span class="m-nav__link-text">
                  Activity
                </span>
              </a>
            </li>
            <li class="m-nav__item">
              <a href="../header/profile&amp;demo=default.html" class="m-nav__link">
                <i class="m-nav__link-icon flaticon-chat-1"></i>
                <span class="m-nav__link-text">
                  Messages
                </span>
              </a>
            </li>
            <li class="m-nav__item">
              <a href="../header/profile&amp;demo=default.html" class="m-nav__link">
                <i class="m-nav__link-icon flaticon-graphic-2"></i>
                <span class="m-nav__link-text">
                  Sales
                </span>
              </a>
            </li>
            <li class="m-nav__item">
              <a href="../header/profile&amp;demo=default.html" class="m-nav__link">
                <i class="m-nav__link-icon flaticon-time-3"></i>
                <span class="m-nav__link-text">
                  Events
                </span>
              </a>
            </li>
            <li class="m-nav__item">
              <a href="../header/profile&amp;demo=default.html" class="m-nav__link">
                <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                <span class="m-nav__link-text">
                  Support
                </span>
              </a>
            </li>
          </ul>
          <div class="m-portlet__body-separator"></div>
          <div class="m-widget1 m-widget1--paddingless">
            <div class="m-widget1__item">
              <div class="row m-row--no-padding align-items-center">
                <div class="col">
                  <h3 class="m-widget1__title">
                    Member Profit
                  </h3>
                  <span class="m-widget1__desc">
                    Awerage Weekly Profit
                  </span>
                </div>
                <div class="col m--align-right">
                  <span class="m-widget1__number m--font-brand">
                    +$17,800
                  </span>
                </div>
              </div>
            </div>
            <div class="m-widget1__item">
              <div class="row m-row--no-padding align-items-center">
                <div class="col">
                  <h3 class="m-widget1__title">
                    Orders
                  </h3>
                  <span class="m-widget1__desc">
                    Weekly Customer Orders
                  </span>
                </div>
                <div class="col m--align-right">
                  <span class="m-widget1__number m--font-danger">
                    +1,800
                  </span>
                </div>
              </div>
            </div>
            <div class="m-widget1__item">
              <div class="row m-row--no-padding align-items-center">
                <div class="col">
                  <h3 class="m-widget1__title">
                    Issue Reports
                  </h3>
                  <span class="m-widget1__desc">
                    System bugs and issues
                  </span>
                </div>
                <div class="col m--align-right">
                  <span class="m-widget1__number m--font-success">
                    -27,49%
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-9 col-lg-8">
      <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
        <div class="m-portlet__head">
          <div class="m-portlet__head-tools">
            <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
              <li class="nav-item m-tabs__item">
                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                  <i class="flaticon-share m--hide"></i>
                  Update Profile
                </a>
              </li>
              <!-- <li class="nav-item m-tabs__item">
                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
                  Messages
                </a>
              </li>
              <li class="nav-item m-tabs__item">
                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_3" role="tab">
                  Settings
                </a>
              </li> -->
            </ul>
          </div>

        </div>
        <div class="tab-content">
          <div class="tab-pane active" id="m_user_profile_tab_1">
            <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="{{ route('customers_update', $object->id) }}">
              {{ csrf_field() }}
              <div class="m-portlet__body">
                <div class="form-group m-form__group m--margin-top-10 m--hide">
                </div>
                <div class="form-group m-form__group row">
                  <div class="col-10 ml-auto">
                    <h3 class="m-form__section">
                      1. Personal Details
                    </h3>
                  </div>
                </div>
                <div class="form-group m-form__group row">
                  <label for="example-text-input" class="col-2 col-form-label">
                    Full Name
                  </label>
                  <div class="col-7">
                    <input class="form-control m-input" type="text" name="name" value="{{ $object->name }}">
                  </div>
                </div>
                <div class="form-group m-form__group row">
                  <label for="example-text-input" class="col-2 col-form-label">
                    Email
                  </label>
                  <div class="col-7">
                    <input class="form-control m-input" type="text" name="email" value="{{ $object->email }}">
                  </div>
                </div>
                <div class="form-group m-form__group row">
                  <label for="example-text-input" class="col-2 col-form-label">
                    Mobile
                  </label>
                  <div class="col-7">
                    <input class="form-control m-input" type="text" name="mobile" value="{{ $object->mobile }}">
                  </div>
                </div>
                <div class="form-group m-form__group row">
                  <label for="example-text-input" class="col-2 col-form-label">
                    Phone No.
                  </label>
                  <div class="col-7">
                    <input class="form-control m-input" type="text" name="phone" value="{{ $object->phone }}">
                  </div>
                </div>
                <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                <div class="form-group m-form__group row">
                  <div class="col-10 ml-auto">
                    <h3 class="m-form__section">
                      2. Address
                    </h3>
                  </div>
                </div>
                <div class="form-group m-form__group row">
                  <label for="example-text-input" class="col-2 col-form-label">
                    Address
                  </label>
                  <div class="col-7">
                    <input class="form-control m-input" type="text" name="address" value="{{ $object->address }}">
                  </div>
                </div>
                <div class="form-group m-form__group row">
                  <label for="example-text-input" class="col-2 col-form-label">
                    City
                  </label>
                  <div class="col-7">
                    <input class="form-control m-input" type="text" name="city" value="{{ $object->city }}">
                  </div>
                </div>
                <div class="form-group m-form__group row">
                  <label for="example-text-input" class="col-2 col-form-label">
                    Area
                  </label>
                  <div class="col-7">
                    <input class="form-control m-input" type="text" name="area" value="{{ $object->area }}">
                  </div>
                </div>
                <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                <div class="form-group m-form__group row">
                  <div class="col-10 ml-auto">
                    <h3 class="m-form__section">
                      3. Social Links
                    </h3>
                  </div>
                </div>
                <div class="form-group m-form__group row">
                  <label for="example-text-input" class="col-2 col-form-label">
                    Linkedin
                  </label>
                  <div class="col-7">
                    <input class="form-control m-input" type="text" name="linkedin" value="{{ $object->linkedin }}">
                  </div>
                </div>
                <div class="form-group m-form__group row">
                  <label for="example-text-input" class="col-2 col-form-label">
                    Facebook
                  </label>
                  <div class="col-7">
                    <input class="form-control m-input" type="text" name="facebook" value="{{ $object->facebook }}">
                  </div>
                </div>
              </div>
              <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions">
                  <div class="row">
                    <div class="col-2"></div>
                    <div class="col-7">
                      <button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">
                        Save changes
                      </button>
                      &nbsp;&nbsp;
                      <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">
                        Cancel
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="tab-pane " id="m_user_profile_tab_2"></div>
          <div class="tab-pane " id="m_user_profile_tab_3"></div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
    @parent

@endsection
