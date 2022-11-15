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
                                        <h3 class="card-title" style="margin: -10px;"><b> @lang('messages.Category Add') </b></h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form method="post" action="{{route('category.store')}}">
                                        @csrf
                                        <div class="card-body" style="margin-top: 26px">
                                            <div class="row">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">@lang('messages.Category Name'): </label>
                                                        <input type="text" name="name" class="form-control"
                                                               id="exampleInputName" placeholder="Enter User Name"
                                                               value="{{old('name')}}">
                                                        <span style="color: red">@error('name'){{$message}}@enderror</span>
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">@lang('messages.Category Icon'): </label>
                                                        <input type="text" name="icon" class="form-control"
                                                               id="exampleInputName" placeholder="Enter Icon"
                                                               value="{{old('icon')}}">
                                                        <span style="color: red">@error('icon'){{$message}}@enderror</span>
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn" style="background-color: #4154f1">@lang('messages.Submit')</button>
                                            <a href="{{route('category.show')}}">
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




