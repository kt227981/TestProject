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
                                        <h3 class="card-title" style="margin: -10px;"><b>  @lang('messages.Add Bank') </b></h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form method="post" action="{{route('account/store')}}">
                                        @csrf
                                        <div class="card-body" style="margin-top: 26px">
                                            <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">@lang('messages.Account Name'): </label>
                                                    <input type="text" name="name" class="form-control"
                                                           id="exampleInputName" placeholder="Enter Bank Name"
                                                           value="{{old('name')}}">
                                                    <span style="color: red">@error('name'){{$message}}@enderror</span>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"> @lang('messages.User Name') </label>

                                                    <select name="user_id" class="form-control" >
                                                        @foreach($user as $data)
                                                            <option value="{{$data->id}}">{{$data->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">@lang('messages.Account Type'):</label><br>
                                                        <input type="radio" name="type" value="cash" > @lang('messages.Cash')
                                                        <input type="radio" name="type" value="bank"> @lang('messages.Bank')<br>
                                                        <span style="color: red">@error('type'){{$message}}@enderror</span>
                                                    </div>
                                                </div>
                                                </div>
                                                    <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">@lang('messages.Amount'): </label>
                                                    <input type="text" name="amount" class="form-control"
                                                           id="exampleInputName" placeholder="Enter Bank Name"
                                                           value="{{old('amount')}}">
                                                    <span style="color: red">@error('amount'){{$message}}@enderror</span>
                                                </div>
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn" style="background-color: #4154f1">@lang('messages.Submit')</button>
                                            <a href="{{route('account/show')}}">
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




