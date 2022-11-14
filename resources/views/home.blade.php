@extends('layouts.app')

@section('content')
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Dashboard') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    {{ __('You are logged in!') }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--    <!DOCTYPE html>--}}
{{--<html lang="en">--}}

@include('flash_message')



<main id="main" class="main">

    <div class="pagetitle">
        <h1>@lang('messages.Dashboard')</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">@lang('messages.Home')</a></li>
                <li class="breadcrumb-item active">@lang('messages.Dashboard')</li>
            </ol>
        </nav>

    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-3">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">@lang('messages.User') </h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="fa fa-users"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{\App\Models\User::all()->count()}}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-3">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">@lang('messages.Category')</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="fa fa-thumbs-o-up"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{\App\Models\admin\Category::all()->count()}}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-md-3">

                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">@lang('messages.TOTAL ACCOUNTS')</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="fa fa-files-o"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{\App\Models\admin\Account::all()->count()}}</h6>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->

                    <div class="col-xxl-4 col-md-3">
                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">@lang('messages.AMOUNTS')  </h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="fa fa-files-o"></i>
                                    </div>
                                    <div class="ps-3">
                                        <?php
                                        $amount = \App\Models\admin\Account::sum('amount');
                                        ?>
                                       <h6> <i class="fa fa-rupee"></i>{{$amount}}</h6>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-4 col-md-3">
                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">@lang('messages.INCOMES AMOUNTS')</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <?php
                                     $income = \App\Models\admin\Income::sum('amount');
                                    ?>
                                    <div class="ps-3">
                                        <h6> <i class="fa fa-rupee"></i>{{$income}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-4 col-md-3">
                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">@lang('messages.EXPENSES AMOUNTS')  </h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <?php
                                     $expenses = \App\Models\admin\Expenses::sum('amount');
                                    ?>
                                    <div class="ps-3">
                                        <h6> <i class="fa fa-rupee"></i>{{$expenses}}</h6>
{{--                                        <h6>{{\App\Models\admin\Expenses::all()->count()}}</h6>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-4 col-md-3">
                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">@lang('messages.TRANSFER AMOUNTS') </h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <?php
                                     $transfer = \App\Models\admin\Transfer::sum('amount');
                                    ?>
                                    <div class="ps-3">
                                        <h6> <i class="fa fa-rupee"></i>{{$transfer}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-4 col-md-3">
                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">@lang('messages.TOTAL BALANCE') </h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <?php
                                    $totle = \App\Models\User::all()->count() + \App\Models\admin\Category::all()->count() + \App\Models\admin\Account::all()->count() + $amount + $income + $expenses + $transfer;
                                    ?>
                                    <div class="ps-3">
                                        <h6> <i class="fa fa-rupee"></i>{{$totle}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-8">

                        <div class="card">

                            <div class="card-body">
                                <h5 class="card-title">@lang('messages.Reports') <span>/@lang('messages.Today')</span></h5>

                                <!-- Line Chart -->
                                <div id="reportsChart" style="min-height: 365px;"><div id="apexchartsh6ya4qws" class="apexcharts-canvas apexchartsh6ya4qws apexcharts-theme-light" style="width: 661px; height: 350px;"><svg id="SvgjsSvg1174" width="661" height="350" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg apexcharts-zoomable hovering-zoom" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><foreignObject x="0" y="0" width="661" height="350"><div class="apexcharts-legend apexcharts-align-center apx-legend-position-bottom" xmlns="http://www.w3.org/1999/xhtml" style="inset: auto 0px 1px; position: absolute; max-height: 175px;"><div class="apexcharts-legend-series" style="margin: 2px 5px;" rel="1" seriesname="Sales" data:collapsed="false"><span class="apexcharts-legend-marker" style="background: rgb(65, 84, 241) !important; color: rgb(65, 84, 241); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;" rel="1" data:collapsed="false"></span><span class="apexcharts-legend-text" style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;" rel="1" i="0" data:default-text="Sales" data:collapsed="false">@lang('messages.Sales')</span></div><div class="apexcharts-legend-series" style="margin: 2px 5px;" rel="2" seriesname="Revenue" data:collapsed="false"><span class="apexcharts-legend-marker" style="background: rgb(46, 202, 106) !important; color: rgb(46, 202, 106); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;" rel="2" data:collapsed="false"></span><span class="apexcharts-legend-text" style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;" rel="2" i="1" data:default-text="Revenue" data:collapsed="false">@lang('messages.Revenue')</span></div><div class="apexcharts-legend-series" style="margin: 2px 5px;" rel="3" seriesname="Customers" data:collapsed="false"><span class="apexcharts-legend-marker" style="background: rgb(255, 119, 29) !important; color: rgb(255, 119, 29); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;" rel="3" data:collapsed="false"></span><span class="apexcharts-legend-text" style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;" rel="3" i="2" data:default-text="Customers" data:collapsed="false">@lang('messages.Customers')</span></div></div><style type="text/css">

                                                    .apexcharts-legend {
                                                        display: flex;
                                                        overflow: auto;
                                                        padding: 0 10px;
                                                    }
                                                    .apexcharts-legend.apx-legend-position-bottom, .apexcharts-legend.apx-legend-position-top {
                                                        flex-wrap: wrap
                                                    }
                                                    .apexcharts-legend.apx-legend-position-right, .apexcharts-legend.apx-legend-position-left {
                                                        flex-direction: column;
                                                        bottom: 0;
                                                    }
                                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left, .apexcharts-legend.apx-legend-position-top.apexcharts-align-left, .apexcharts-legend.apx-legend-position-right, .apexcharts-legend.apx-legend-position-left {
                                                        justify-content: flex-start;
                                                    }
                                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center, .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                                        justify-content: center;
                                                    }
                                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right, .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                                        justify-content: flex-end;
                                                    }
                                                    .apexcharts-legend-series {
                                                        cursor: pointer;
                                                        line-height: normal;
                                                    }
                                                    .apexcharts-legend.apx-legend-position-bottom .apexcharts-legend-series, .apexcharts-legend.apx-legend-position-top .apexcharts-legend-series{
                                                        display: flex;
                                                        align-items: center;
                                                    }
                                                    .apexcharts-legend-text {
                                                        position: relative;
                                                        font-size: 14px;
                                                    }
                                                    .apexcharts-legend-text *, .apexcharts-legend-marker * {
                                                        pointer-events: none;
                                                    }
                                                    .apexcharts-legend-marker {
                                                        position: relative;
                                                        display: inline-block;
                                                        cursor: pointer;
                                                        margin-right: 3px;
                                                        border-style: solid;
                                                    }

                                                    .apexcharts-legend.apexcharts-align-right .apexcharts-legend-series, .apexcharts-legend.apexcharts-align-left .apexcharts-legend-series{
                                                        display: inline-block;
                                                    }
                                                    .apexcharts-legend-series.apexcharts-no-click {
                                                        cursor: auto;
                                                    }
                                                    .apexcharts-legend .apexcharts-hidden-zero-series, .apexcharts-legend .apexcharts-hidden-null-series {
                                                        display: none !important;
                                                    }
                                                    .apexcharts-inactive-legend {
                                                        opacity: 0.45;
                                                    }</style></foreignObject><g id="SvgjsG1176" class="apexcharts-inner apexcharts-graphical" transform="translate(50, 30)"><defs id="SvgjsDefs1175"><clipPath id="gridRectMaskh6ya4qws"><rect id="SvgjsRect1186" width="607" height="271.2" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskh6ya4qws"></clipPath><clipPath id="nonForecastMaskh6ya4qws"></clipPath><clipPath id="gridRectMarkerMaskh6ya4qws"><rect id="SvgjsRect1187" width="649" height="317.2" x="-24" y="-24" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><linearGradient id="SvgjsLinearGradient1205" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1206" stop-opacity="0.3" stop-color="rgba(65,84,241,0.3)" offset="0"></stop><stop id="SvgjsStop1207" stop-opacity="0.4" stop-color="rgba(255,255,255,0.4)" offset="0.9"></stop><stop id="SvgjsStop1208" stop-opacity="0.4" stop-color="rgba(255,255,255,0.4)" offset="1"></stop></linearGradient><linearGradient id="SvgjsLinearGradient1227" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1228" stop-opacity="0.3" stop-color="rgba(46,202,106,0.3)" offset="0"></stop><stop id="SvgjsStop1229" stop-opacity="0.4" stop-color="rgba(255,255,255,0.4)" offset="0.9"></stop><stop id="SvgjsStop1230" stop-opacity="0.4" stop-color="rgba(255,255,255,0.4)" offset="1"></stop></linearGradient><linearGradient id="SvgjsLinearGradient1249" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1250" stop-opacity="0.3" stop-color="rgba(255,119,29,0.3)" offset="0"></stop><stop id="SvgjsStop1251" stop-opacity="0.4" stop-color="rgba(255,255,255,0.4)" offset="0.9"></stop><stop id="SvgjsStop1252" stop-opacity="0.4" stop-color="rgba(255,255,255,0.4)" offset="1"></stop></linearGradient></defs><line id="SvgjsLine1182" x1="-0.5" y1="0" x2="-0.5" y2="269.2" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="-0.5" y="0" width="1" height="269.2" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1255" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1256" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"><text id="SvgjsText1258" font-family="Helvetica, Arial, sans-serif" x="0" y="298.2" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1259">00:00</tspan><title>00:00</title></text><text id="SvgjsText1261" font-family="Helvetica, Arial, sans-serif" x="92.46153846153847" y="298.2" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1262">01:00</tspan><title>01:00</title></text><text id="SvgjsText1264" font-family="Helvetica, Arial, sans-serif" x="184.92307692307693" y="298.2" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1265">02:00</tspan><title>02:00</title></text><text id="SvgjsText1267" font-family="Helvetica, Arial, sans-serif" x="277.3846153846154" y="298.2" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1268">03:00</tspan><title>03:00</title></text><text id="SvgjsText1270" font-family="Helvetica, Arial, sans-serif" x="369.84615384615387" y="298.2" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1271">04:00</tspan><title>04:00</title></text><text id="SvgjsText1273" font-family="Helvetica, Arial, sans-serif" x="462.3076923076923" y="298.2" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1274">05:00</tspan><title>05:00</title></text><text id="SvgjsText1276" font-family="Helvetica, Arial, sans-serif" x="554.7692307692308" y="298.2" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1277">06:00</tspan><title>06:00</title></text></g><line id="SvgjsLine1278" x1="0" y1="270.2" x2="601" y2="270.2" stroke="#e0e0e0" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"></line></g><g id="SvgjsG1299" class="apexcharts-grid"><g id="SvgjsG1300" class="apexcharts-gridlines-horizontal"><line id="SvgjsLine1309" x1="0" y1="0" x2="601" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1310" x1="0" y1="53.839999999999996" x2="601" y2="53.839999999999996" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1311" x1="0" y1="107.67999999999999" x2="601" y2="107.67999999999999" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1312" x1="0" y1="161.51999999999998" x2="601" y2="161.51999999999998" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1313" x1="0" y1="215.35999999999999" x2="601" y2="215.35999999999999" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1314" x1="0" y1="269.2" x2="601" y2="269.2" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1301" class="apexcharts-gridlines-vertical"></g><line id="SvgjsLine1302" x1="0" y1="270.2" x2="0" y2="276.2" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1303" x1="92.46153846153847" y1="270.2" x2="92.46153846153847" y2="276.2" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1304" x1="184.92307692307693" y1="270.2" x2="184.92307692307693" y2="276.2" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1305" x1="277.3846153846154" y1="270.2" x2="277.3846153846154" y2="276.2" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1306" x1="369.84615384615387" y1="270.2" x2="369.84615384615387" y2="276.2" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1307" x1="462.3076923076923" y1="270.2" x2="462.3076923076923" y2="276.2" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1308" x1="554.7692307692308" y1="270.2" x2="554.7692307692308" y2="276.2" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1316" x1="0" y1="269.2" x2="601" y2="269.2" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1315" x1="0" y1="1" x2="0" y2="269.2" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1188" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1189" class="apexcharts-series" seriesName="Sales" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1209" d="M 0 269.2L 0 185.748C 48.54230769230769 185.748 90.14999999999999 161.51999999999998 138.69230769230768 161.51999999999998C 171.05384615384614 161.51999999999998 198.7923076923077 193.824 231.15384615384616 193.824C 263.5153846153846 193.824 291.25384615384615 131.908 323.61538461538464 131.908C 355.9769230769231 131.908 383.71538461538466 156.136 416.0769230769231 156.136C 448.4384615384615 156.136 476.1769230769231 48.45599999999999 508.53846153846155 48.45599999999999C 540.9 48.45599999999999 568.6384615384616 118.44800000000001 601 118.44800000000001C 601 118.44800000000001 601 118.44800000000001 601 269.2M 601 118.44800000000001z" fill="url(#SvgjsLinearGradient1205)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskh6ya4qws)" pathTo="M 0 269.2L 0 185.748C 48.54230769230769 185.748 90.14999999999999 161.51999999999998 138.69230769230768 161.51999999999998C 171.05384615384614 161.51999999999998 198.7923076923077 193.824 231.15384615384616 193.824C 263.5153846153846 193.824 291.25384615384615 131.908 323.61538461538464 131.908C 355.9769230769231 131.908 383.71538461538466 156.136 416.0769230769231 156.136C 448.4384615384615 156.136 476.1769230769231 48.45599999999999 508.53846153846155 48.45599999999999C 540.9 48.45599999999999 568.6384615384616 118.44800000000001 601 118.44800000000001C 601 118.44800000000001 601 118.44800000000001 601 269.2M 601 118.44800000000001z" pathFrom="M -1 269.2L -1 269.2L 138.69230769230768 269.2L 231.15384615384616 269.2L 323.61538461538464 269.2L 416.0769230769231 269.2L 508.53846153846155 269.2L 601 269.2"></path><path id="SvgjsPath1210" d="M 0 185.748C 48.54230769230769 185.748 90.14999999999999 161.51999999999998 138.69230769230768 161.51999999999998C 171.05384615384614 161.51999999999998 198.7923076923077 193.824 231.15384615384616 193.824C 263.5153846153846 193.824 291.25384615384615 131.908 323.61538461538464 131.908C 355.9769230769231 131.908 383.71538461538466 156.136 416.0769230769231 156.136C 448.4384615384615 156.136 476.1769230769231 48.45599999999999 508.53846153846155 48.45599999999999C 540.9 48.45599999999999 568.6384615384616 118.44800000000001 601 118.44800000000001" fill="none" fill-opacity="1" stroke="#4154f1" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskh6ya4qws)" pathTo="M 0 185.748C 48.54230769230769 185.748 90.14999999999999 161.51999999999998 138.69230769230768 161.51999999999998C 171.05384615384614 161.51999999999998 198.7923076923077 193.824 231.15384615384616 193.824C 263.5153846153846 193.824 291.25384615384615 131.908 323.61538461538464 131.908C 355.9769230769231 131.908 383.71538461538466 156.136 416.0769230769231 156.136C 448.4384615384615 156.136 476.1769230769231 48.45599999999999 508.53846153846155 48.45599999999999C 540.9 48.45599999999999 568.6384615384616 118.44800000000001 601 118.44800000000001" pathFrom="M -1 269.2L -1 269.2L 138.69230769230768 269.2L 231.15384615384616 269.2L 323.61538461538464 269.2L 416.0769230769231 269.2L 508.53846153846155 269.2L 601 269.2"></path><g id="SvgjsG1190" class="apexcharts-series-markers-wrap" data:realIndex="0"><g id="SvgjsG1192" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskh6ya4qws)"><circle id="SvgjsCircle1193" r="4" cx="0" cy="185.748" class="apexcharts-marker no-pointer-events w9fr8jkf" stroke="#ffffff" fill="#4154f1" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="0" j="0" index="0" default-marker-size="4"></circle><circle id="SvgjsCircle1194" r="4" cx="138.69230769230768" cy="161.51999999999998" class="apexcharts-marker no-pointer-events wg2tolkca" stroke="#ffffff" fill="#4154f1" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="1" j="1" index="0" default-marker-size="4"></circle></g><g id="SvgjsG1195" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskh6ya4qws)"><circle id="SvgjsCircle1196" r="4" cx="231.15384615384616" cy="193.824" class="apexcharts-marker no-pointer-events wysn8vdrq" stroke="#ffffff" fill="#4154f1" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="2" j="2" index="0" default-marker-size="4"></circle></g><g id="SvgjsG1197" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskh6ya4qws)"><circle id="SvgjsCircle1198" r="4" cx="323.61538461538464" cy="131.908" class="apexcharts-marker no-pointer-events wgv6c6h9b" stroke="#ffffff" fill="#4154f1" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="3" j="3" index="0" default-marker-size="4"></circle></g><g id="SvgjsG1199" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskh6ya4qws)"><circle id="SvgjsCircle1200" r="4" cx="416.0769230769231" cy="156.136" class="apexcharts-marker no-pointer-events w91koy7qc" stroke="#ffffff" fill="#4154f1" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="4" j="4" index="0" default-marker-size="4"></circle></g><g id="SvgjsG1201" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskh6ya4qws)"><circle id="SvgjsCircle1202" r="4" cx="508.53846153846155" cy="48.45599999999999" class="apexcharts-marker no-pointer-events wddwtgl52" stroke="#ffffff" fill="#4154f1" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="5" j="5" index="0" default-marker-size="4"></circle></g><g id="SvgjsG1203" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskh6ya4qws)"><circle id="SvgjsCircle1204" r="4" cx="601" cy="118.44800000000001" class="apexcharts-marker no-pointer-events w4utidyvb" stroke="#ffffff" fill="#4154f1" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="6" j="6" index="0" default-marker-size="4"></circle></g></g></g><g id="SvgjsG1211" class="apexcharts-series" seriesName="Revenue" data:longestSeries="true" rel="2" data:realIndex="1"><path id="SvgjsPath1231" d="M 0 269.2L 0 239.588C 48.54230769230769 239.588 90.14999999999999 183.05599999999998 138.69230769230768 183.05599999999998C 171.05384615384614 183.05599999999998 198.7923076923077 148.06 231.15384615384616 148.06C 263.5153846153846 148.06 291.25384615384615 183.05599999999998 323.61538461538464 183.05599999999998C 355.9769230769231 183.05599999999998 383.71538461538466 177.672 416.0769230769231 177.672C 448.4384615384615 177.672 476.1769230769231 129.21599999999998 508.53846153846155 129.21599999999998C 540.9 129.21599999999998 568.6384615384616 158.82799999999997 601 158.82799999999997C 601 158.82799999999997 601 158.82799999999997 601 269.2M 601 158.82799999999997z" fill="url(#SvgjsLinearGradient1227)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="1" clip-path="url(#gridRectMaskh6ya4qws)" pathTo="M 0 269.2L 0 239.588C 48.54230769230769 239.588 90.14999999999999 183.05599999999998 138.69230769230768 183.05599999999998C 171.05384615384614 183.05599999999998 198.7923076923077 148.06 231.15384615384616 148.06C 263.5153846153846 148.06 291.25384615384615 183.05599999999998 323.61538461538464 183.05599999999998C 355.9769230769231 183.05599999999998 383.71538461538466 177.672 416.0769230769231 177.672C 448.4384615384615 177.672 476.1769230769231 129.21599999999998 508.53846153846155 129.21599999999998C 540.9 129.21599999999998 568.6384615384616 158.82799999999997 601 158.82799999999997C 601 158.82799999999997 601 158.82799999999997 601 269.2M 601 158.82799999999997z" pathFrom="M -1 269.2L -1 269.2L 138.69230769230768 269.2L 231.15384615384616 269.2L 323.61538461538464 269.2L 416.0769230769231 269.2L 508.53846153846155 269.2L 601 269.2"></path><path id="SvgjsPath1232" d="M 0 239.588C 48.54230769230769 239.588 90.14999999999999 183.05599999999998 138.69230769230768 183.05599999999998C 171.05384615384614 183.05599999999998 198.7923076923077 148.06 231.15384615384616 148.06C 263.5153846153846 148.06 291.25384615384615 183.05599999999998 323.61538461538464 183.05599999999998C 355.9769230769231 183.05599999999998 383.71538461538466 177.672 416.0769230769231 177.672C 448.4384615384615 177.672 476.1769230769231 129.21599999999998 508.53846153846155 129.21599999999998C 540.9 129.21599999999998 568.6384615384616 158.82799999999997 601 158.82799999999997" fill="none" fill-opacity="1" stroke="#2eca6a" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="1" clip-path="url(#gridRectMaskh6ya4qws)" pathTo="M 0 239.588C 48.54230769230769 239.588 90.14999999999999 183.05599999999998 138.69230769230768 183.05599999999998C 171.05384615384614 183.05599999999998 198.7923076923077 148.06 231.15384615384616 148.06C 263.5153846153846 148.06 291.25384615384615 183.05599999999998 323.61538461538464 183.05599999999998C 355.9769230769231 183.05599999999998 383.71538461538466 177.672 416.0769230769231 177.672C 448.4384615384615 177.672 476.1769230769231 129.21599999999998 508.53846153846155 129.21599999999998C 540.9 129.21599999999998 568.6384615384616 158.82799999999997 601 158.82799999999997" pathFrom="M -1 269.2L -1 269.2L 138.69230769230768 269.2L 231.15384615384616 269.2L 323.61538461538464 269.2L 416.0769230769231 269.2L 508.53846153846155 269.2L 601 269.2"></path><g id="SvgjsG1212" class="apexcharts-series-markers-wrap" data:realIndex="1"><g id="SvgjsG1214" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskh6ya4qws)"><circle id="SvgjsCircle1215" r="4" cx="0" cy="239.588" class="apexcharts-marker no-pointer-events wo68sxcnd" stroke="#ffffff" fill="#2eca6a" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="0" j="0" index="1" default-marker-size="4"></circle><circle id="SvgjsCircle1216" r="4" cx="138.69230769230768" cy="183.05599999999998" class="apexcharts-marker no-pointer-events wzrllneywh" stroke="#ffffff" fill="#2eca6a" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="1" j="1" index="1" default-marker-size="4"></circle></g><g id="SvgjsG1217" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskh6ya4qws)"><circle id="SvgjsCircle1218" r="4" cx="231.15384615384616" cy="148.06" class="apexcharts-marker no-pointer-events wvbaxyl29" stroke="#ffffff" fill="#2eca6a" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="2" j="2" index="1" default-marker-size="4"></circle></g><g id="SvgjsG1219" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskh6ya4qws)"><circle id="SvgjsCircle1220" r="4" cx="323.61538461538464" cy="183.05599999999998" class="apexcharts-marker no-pointer-events w99bl860j" stroke="#ffffff" fill="#2eca6a" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="3" j="3" index="1" default-marker-size="4"></circle></g><g id="SvgjsG1221" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskh6ya4qws)"><circle id="SvgjsCircle1222" r="4" cx="416.0769230769231" cy="177.672" class="apexcharts-marker no-pointer-events wze5gmm06h" stroke="#ffffff" fill="#2eca6a" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="4" j="4" index="1" default-marker-size="4"></circle></g><g id="SvgjsG1223" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskh6ya4qws)"><circle id="SvgjsCircle1224" r="4" cx="508.53846153846155" cy="129.21599999999998" class="apexcharts-marker no-pointer-events w6n5ds3w0g" stroke="#ffffff" fill="#2eca6a" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="5" j="5" index="1" default-marker-size="4"></circle></g><g id="SvgjsG1225" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskh6ya4qws)"><circle id="SvgjsCircle1226" r="4" cx="601" cy="158.82799999999997" class="apexcharts-marker no-pointer-events w61lnr1os" stroke="#ffffff" fill="#2eca6a" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="6" j="6" index="1" default-marker-size="4"></circle></g></g></g><g id="SvgjsG1233" class="apexcharts-series" seriesName="Customers" data:longestSeries="true" rel="3" data:realIndex="2"><path id="SvgjsPath1253" d="M 0 269.2L 0 228.82C 48.54230769230769 228.82 90.14999999999999 239.588 138.69230769230768 239.588C 171.05384615384614 239.588 198.7923076923077 183.05599999999998 231.15384615384616 183.05599999999998C 263.5153846153846 183.05599999999998 291.25384615384615 220.744 323.61538461538464 220.744C 355.9769230769231 220.744 383.71538461538466 244.97199999999998 416.0769230769231 244.97199999999998C 448.4384615384615 244.97199999999998 476.1769230769231 204.59199999999998 508.53846153846155 204.59199999999998C 540.9 204.59199999999998 568.6384615384616 239.588 601 239.588C 601 239.588 601 239.588 601 269.2M 601 239.588z" fill="url(#SvgjsLinearGradient1249)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="2" clip-path="url(#gridRectMaskh6ya4qws)" pathTo="M 0 269.2L 0 228.82C 48.54230769230769 228.82 90.14999999999999 239.588 138.69230769230768 239.588C 171.05384615384614 239.588 198.7923076923077 183.05599999999998 231.15384615384616 183.05599999999998C 263.5153846153846 183.05599999999998 291.25384615384615 220.744 323.61538461538464 220.744C 355.9769230769231 220.744 383.71538461538466 244.97199999999998 416.0769230769231 244.97199999999998C 448.4384615384615 244.97199999999998 476.1769230769231 204.59199999999998 508.53846153846155 204.59199999999998C 540.9 204.59199999999998 568.6384615384616 239.588 601 239.588C 601 239.588 601 239.588 601 269.2M 601 239.588z" pathFrom="M -1 269.2L -1 269.2L 138.69230769230768 269.2L 231.15384615384616 269.2L 323.61538461538464 269.2L 416.0769230769231 269.2L 508.53846153846155 269.2L 601 269.2"></path><path id="SvgjsPath1254" d="M 0 228.82C 48.54230769230769 228.82 90.14999999999999 239.588 138.69230769230768 239.588C 171.05384615384614 239.588 198.7923076923077 183.05599999999998 231.15384615384616 183.05599999999998C 263.5153846153846 183.05599999999998 291.25384615384615 220.744 323.61538461538464 220.744C 355.9769230769231 220.744 383.71538461538466 244.97199999999998 416.0769230769231 244.97199999999998C 448.4384615384615 244.97199999999998 476.1769230769231 204.59199999999998 508.53846153846155 204.59199999999998C 540.9 204.59199999999998 568.6384615384616 239.588 601 239.588" fill="none" fill-opacity="1" stroke="#ff771d" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="2" clip-path="url(#gridRectMaskh6ya4qws)" pathTo="M 0 228.82C 48.54230769230769 228.82 90.14999999999999 239.588 138.69230769230768 239.588C 171.05384615384614 239.588 198.7923076923077 183.05599999999998 231.15384615384616 183.05599999999998C 263.5153846153846 183.05599999999998 291.25384615384615 220.744 323.61538461538464 220.744C 355.9769230769231 220.744 383.71538461538466 244.97199999999998 416.0769230769231 244.97199999999998C 448.4384615384615 244.97199999999998 476.1769230769231 204.59199999999998 508.53846153846155 204.59199999999998C 540.9 204.59199999999998 568.6384615384616 239.588 601 239.588" pathFrom="M -1 269.2L -1 269.2L 138.69230769230768 269.2L 231.15384615384616 269.2L 323.61538461538464 269.2L 416.0769230769231 269.2L 508.53846153846155 269.2L 601 269.2"></path><g id="SvgjsG1234" class="apexcharts-series-markers-wrap" data:realIndex="2"><g id="SvgjsG1236" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskh6ya4qws)"><circle id="SvgjsCircle1237" r="4" cx="0" cy="228.82" class="apexcharts-marker no-pointer-events w5qfhd5mv" stroke="#ffffff" fill="#ff771d" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="0" j="0" index="2" default-marker-size="4"></circle><circle id="SvgjsCircle1238" r="4" cx="138.69230769230768" cy="239.588" class="apexcharts-marker no-pointer-events w2xhzg2ei" stroke="#ffffff" fill="#ff771d" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="1" j="1" index="2" default-marker-size="4"></circle></g><g id="SvgjsG1239" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskh6ya4qws)"><circle id="SvgjsCircle1240" r="4" cx="231.15384615384616" cy="183.05599999999998" class="apexcharts-marker no-pointer-events wkezwax7w" stroke="#ffffff" fill="#ff771d" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="2" j="2" index="2" default-marker-size="4"></circle></g><g id="SvgjsG1241" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskh6ya4qws)"><circle id="SvgjsCircle1242" r="4" cx="323.61538461538464" cy="220.744" class="apexcharts-marker no-pointer-events wgt13br3e" stroke="#ffffff" fill="#ff771d" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="3" j="3" index="2" default-marker-size="4"></circle></g><g id="SvgjsG1243" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskh6ya4qws)"><circle id="SvgjsCircle1244" r="4" cx="416.0769230769231" cy="244.97199999999998" class="apexcharts-marker no-pointer-events wy5ryevii" stroke="#ffffff" fill="#ff771d" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="4" j="4" index="2" default-marker-size="4"></circle></g><g id="SvgjsG1245" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskh6ya4qws)"><circle id="SvgjsCircle1246" r="4" cx="508.53846153846155" cy="204.59199999999998" class="apexcharts-marker no-pointer-events w1wb6zmq6" stroke="#ffffff" fill="#ff771d" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="5" j="5" index="2" default-marker-size="4"></circle></g><g id="SvgjsG1247" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskh6ya4qws)"><circle id="SvgjsCircle1248" r="4" cx="601" cy="239.588" class="apexcharts-marker no-pointer-events w4lzl1azlk" stroke="#ffffff" fill="#ff771d" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="6" j="6" index="2" default-marker-size="4"></circle></g></g></g><g id="SvgjsG1191" class="apexcharts-datalabels" data:realIndex="0"></g><g id="SvgjsG1213" class="apexcharts-datalabels" data:realIndex="1"></g><g id="SvgjsG1235" class="apexcharts-datalabels" data:realIndex="2"></g></g><line id="SvgjsLine1317" x1="0" y1="0" x2="601" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1318" x1="0" y1="0" x2="601" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1319" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1320" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1321" class="apexcharts-point-annotations"></g><rect id="SvgjsRect1322" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-zoom-rect"></rect><rect id="SvgjsRect1323" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-selection-rect"></rect></g><rect id="SvgjsRect1181" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g id="SvgjsG1279" class="apexcharts-yaxis" rel="0" transform="translate(20, 0)"><g id="SvgjsG1280" class="apexcharts-yaxis-texts-g"><text id="SvgjsText1282" font-family="Helvetica, Arial, sans-serif" x="20" y="31.5" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1283">100</tspan><title>100</title></text><text id="SvgjsText1285" font-family="Helvetica, Arial, sans-serif" x="20" y="85.34" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1286">80</tspan><title>80</title></text><text id="SvgjsText1288" font-family="Helvetica, Arial, sans-serif" x="20" y="139.18" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1289">60</tspan><title>60</title></text><text id="SvgjsText1291" font-family="Helvetica, Arial, sans-serif" x="20" y="193.02" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1292">40</tspan><title>40</title></text><text id="SvgjsText1294" font-family="Helvetica, Arial, sans-serif" x="20" y="246.86" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1295">20</tspan><title>20</title></text><text id="SvgjsText1297" font-family="Helvetica, Arial, sans-serif" x="20" y="300.7" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1298">0</tspan><title>0</title></text></g></g><g id="SvgjsG1177" class="apexcharts-annotations"></g></svg><div class="apexcharts-tooltip apexcharts-theme-light" style="left: 65px; top: 163.2px;"><div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group apexcharts-active" style="order: 1; display: flex;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(65, 84, 241);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"></div></div></div><div class="apexcharts-tooltip-series-group apexcharts-active" style="order: 2; display: flex;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(46, 202, 106);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"></div></div></div><div class="apexcharts-tooltip-series-group apexcharts-active" style="order: 3; display: flex;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(255, 119, 29);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"></div></div></div></div><div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light" style="left: -2px; top: 301.2px;"><div class="apexcharts-xaxistooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px; min-width: 75px;"></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>



                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                    <div class="card">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>

                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>

                        <div class="card-body pb-0">
                            <h5 class="card-title">@lang('messages.Website Traffic') <span>| @lang('messages.Today')</span></h5>

                            <div id="trafficChart" style="min-height: 400px; user-select: none; position: relative;" class="echart" _echarts_instance_="ec_1668080380520"><div style="position: relative; width: 298px; height: 400px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;"><canvas style="position: absolute; left: 0px; top: 0px; width: 298px; height: 400px; user-select: none; padding: 0px; margin: 0px; border-width: 0px;" data-zr-dom-id="zr_0" width="298" height="400"></canvas></div><div class="" style="position: absolute; display: block; border-style: solid; white-space: nowrap; z-index: 9999999; box-shadow: rgba(0, 0, 0, 0.2) 1px 2px 10px; transition: opacity 0.2s cubic-bezier(0.23, 1, 0.32, 1) 0s, visibility 0.2s cubic-bezier(0.23, 1, 0.32, 1) 0s, transform 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s; background-color: rgb(255, 255, 255); border-width: 1px; border-radius: 4px; color: rgb(102, 102, 102); font: 14px / 21px Microsoft YaHei; padding: 10px; top: 0px; left: 0px; transform: translate3d(7px, 201px, 0px); border-color: rgb(84, 112, 198); pointer-events: none; visibility: hidden; opacity: 0;"><div style="margin: 0px 0 0;line-height:1;"><div style="font-size:14px;color:#666;font-weight:400;line-height:1;">Access From</div><div style="margin: 10px 0 0;line-height:1;"><div style="margin: 0px 0 0;line-height:1;"><span style="display:inline-block;margin-right:4px;border-radius:10px;width:10px;height:10px;background-color:#5470c6;"></span><span style="font-size:14px;color:#666;font-weight:400;margin-left:2px">@lang('messages.Search Engine')</span><span style="float:right;margin-left:20px;font-size:14px;color:#666;font-weight:900">1,048</span><div style="clear:both"></div></div><div style="clear:both"></div></div><div style="clear:both"></div></div></div></div>

                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    echarts.init(document.querySelector("#trafficChart")).setOption({
                                        tooltip: {
                                            trigger: 'item'
                                        },
                                        legend: {
                                            top: '5%',
                                            left: 'center'
                                        },
                                        series: [{
                                            name: 'Access From',
                                            type: 'pie',
                                            radius: ['40%', '70%'],
                                            avoidLabelOverlap: false,
                                            label: {
                                                show: false,
                                                position: 'center'
                                            },
                                            emphasis: {
                                                label: {
                                                    show: true,
                                                    fontSize: '18',
                                                    fontWeight: 'bold'
                                                }
                                            },
                                            labelLine: {
                                                show: false
                                            },
                                            data: [{
                                                value: 1048,
                                                name: '@lang('messages.Search Engine')'
                                            },
                                                {
                                                    value: 735,
                                                    name: '@lang('messages.Direct')'
                                                },
                                                {
                                                    value: 580,
                                                    name: '@lang('messages.Email')'
                                                },
                                                {
                                                    value: 484,
                                                    name: '@lang('messages.Union Ads')'
                                                },
                                                {
                                                    value: 300,
                                                    name: '@lang('messages.Video Ads')'
                                                }
                                            ]
                                        }]
                                    });
                                });
                            </script>

                        </div>
                    </div>


                </div>
                    </div>
                </div>
            </div>




        </div>
    </section>

</main><!-- End #main -->



@endsection



