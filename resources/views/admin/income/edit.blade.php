@extends('layouts.app')
@section('content')



    <style>
        body {
            /*overflow-y: hidden; !* Hide vertical scrollbar *!*/
            overflow-x: hidden; /* Hide horizontal scrollbar */
        }
    </style>
    <main id="main" class="main">

        <div class="pagetitle">

            <div class="content-wrapper card" STYLE="height: 150%; width: 2180px;">

            @include('flash_message')
            <!-- Main content -->
                <section class="content">

                    <div class="container-fluid">
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-6">
                                <!-- general form elements -->
                                <div class="card card" style="background-color: #f4f6f9">
                                    <div class="card-header" style="margin-top: 20px">
                                        <h3 class="card-title" style="margin: -10px;"><b> @lang('messages.Income Update') </b></h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form method="post" action="{{route('income/update',$value->id)}}">
                                        @csrf
                                        <div class="card-body" style="margin-top: 26px">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1"> @lang('messages.User Name') </label>

                                                        <select name="user_id" class="form-control" >
                                                            @foreach($user_id as $data)
                                                                <option value="{{$data->id}}" {{$value->user_id == $data->id ? 'selected="selected"' : ''}}>{{$data->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1"> @lang('messages.Account Name') </label>

                                                        <select name="account_id" class="form-control" >
                                                            @foreach($account_id as $data)
                                                                <option value="{{$data->id}}" {{$value->account_id == $data->id ? 'selected="selected"' : ''}}>{{$data->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1"> @lang('messages.Category Name') </label>

                                                        <select name="category_id" class="form-control" >
                                                           @foreach($category_id as $data)
                                                                <option value="{{$data->id}}"{{$value->category_id == $data->id ? 'selected="selected"' : ''}}>{{$data->name}}</option>
                                                           @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">@lang('messages.Date')</label>
                                                        <input class="form-control" type="date" name="date" value="{{$value['date']}}" placeholder="Enter Date">
                                                        <span style="color: red">@error('date'){{$message}}@enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">@lang('messages.Income Amount'): </label>
                                                        <input type="text" name="amount" class="form-control"
                                                               id="exampleInputName" placeholder="Enter Amount"
                                                               value="{{$value['amount']}}">
                                                        <span style="color: red">@error('amount'){{$message}}@enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">@lang('messages.Remark'): </label>
                                                        <textarea rows="2" name="remark" class="form-control"
                                                                  id="exampleInputName" placeholder="Enter Remark">{{$value['remark']}}</textarea>
                                                        <span style="color: red">@error('remark'){{$message}}@enderror</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn" style="background-color: #4154f1">@lang('messages.Submit')</button>
                                            <a href="{{route('income/show')}}">
                                                <button type="button" class="btn btn" style="background-color: #6c757d">@lang('messages.Back')</button>
                                            </a>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </main>
@endsection




