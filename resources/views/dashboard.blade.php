@extends('layouts.master')
@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title ">
                Dashboard
            </h3>
        </div>
        <div>
            <span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
                <span class="m-subheader__daterange-label">
                    <span class="m-subheader__daterange-title"></span>
                    <span class="m-subheader__daterange-date m--font-brand"></span>
                </span>
                <a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                    <i class="la la-angle-down"></i>
                </a>
            </span>
        </div>
    </div>
</div>
<!-- END: Subheader -->
<div class="m-content">
    <!--Begin::Section-->
    <div class="row">
        <div class="col-xl-12">
            <!--begin:: Widgets/Quick Stats-->
            <div class="row m-row--full-height">
            <div class="col-sm-12 col-md-12 col-lg-2">
                    <div class="m-portlet m-portlet--half-height m-portlet--border-bottom-brand ">
                        <div class="m-portlet__body">
                            <a href="#">
                                <div class="m-widget26">
                                    <div class="m-widget26__number">
                                         111
                                        <small>
                                            Total Order
                                        </small>
                                    </div>
                                    <div class="m-widget26__chart" style="height:90px; width: 220px;">

                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="m--space-30"></div>

                </div>
                <div class="col-sm-12 col-md-12 col-lg-2">
                    <div class="m-portlet m-portlet--half-height m-portlet--border-bottom-success ">
                        <div class="m-portlet__body">
                            <a href="#">
                                <div class="m-widget26">
                                    <div class="m-widget26__number">
                                    210
                                        <small>
                                            Total Invoice
                                        </small>
                                    </div>
                                    <div class="m-widget26__chart" style="height:90px; width: 220px;">
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="m--space-30"></div>
                </div>
                <!--
                <div class="col-sm-12 col-md-12 col-lg-2">
                    <div class="m-portlet m-portlet--half-height m-portlet--border-bottom-danger ">
                        <div class="m-portlet__body">
                            <a href="#">
                                <div class="m-widget26">
                                    <div class="m-widget26__number">
                                    300
                                        <small>
                                            Total Entry
                                        </small>
                                    </div>
                                    <div class="m-widget26__chart" style="height:90px; width: 220px;">
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="m--space-30"></div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-2">
                    <div class="m-portlet m-portlet--half-height m-portlet--border-bottom-info ">
                        <div class="m-portlet__body">
                            <a href="#">
                                <div class="m-widget26">
                                    <div class="m-widget26__number">
                                    100
                                        <small>
                                            Total Company
                                        </small>
                                    </div>
                                    <div class="m-widget26__chart" style="height:90px; width: 220px;">
                                        {{--<canvas id="m_chart_quick_stats_3"></canvas>--}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="m--space-30"></div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-2">
                    <div class="m-portlet m-portlet--half-height m-portlet--border-bottom-warning ">
                        <div class="m-portlet__body">
                            <a href="#">
                                <div class="m-widget26">
                                    <div class="m-widget26__number">
                                    500
                                        <small>
                                            Total Medicine
                                        </small>
                                    </div>
                                    <div class="m-widget26__chart" style="height:90px; width: 220px;">
                                        {{--<canvas id="m_chart_quick_stats_3"></canvas>--}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="m--space-30"></div>
                </div> -->

            </div>
            <!--end:: Widgets/Quick Stats-->
        </div>

    </div>
    <!--End::Section-->
</div>
@endsection
