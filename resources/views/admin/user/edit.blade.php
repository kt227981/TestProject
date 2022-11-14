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

            <div class="content-wrapper" STYLE="height: 10%; width: 2180px;">


                <!-- Main content -->
                <section class="content">

                    <div class="container-fluid">
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-6">
                                <!-- general form elements -->
                                <div class="card card" style="background-color: #f4f6f9">
                                    <div class="card-header">
                                        <h3 class="card-title" style="margin: -10px;"><b> @lang('messages.Users Update') </b></h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form method="post" action="{{route('user.update',$value->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body" style="margin-top: 26px">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">@lang('messages.User Name'): </label>
                                                        <input type="text" name="name" class="form-control"
                                                               id="exampleInputName" placeholder="Enter User Name"
                                                               value="{{$value['name']}}">
                                                        <span style="color: red">@error('name'){{$message}}@enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">@lang('messages.User Profile Picture'): </label>
                                                        <input id="profile_image" type="file" class="form-control @error('profile_image') is-invalid @enderror" name="profile_image" value="{{ $value['profile_image'] }}" required autocomplete="profile_image" >
                                                        <span style="color: red">@error('profile_image'){{$message}}@enderror</span>
                                                    </div>
                                                    <img src="{{asset('storage/profile_image/'.$value->profile_image)}}" height="70px" width="70px" alt="user">
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">@lang('messages.User Mobile Number'): </label>
                                                        <input type="text" name="mobile_no" class="form-control"
                                                               id="exampleInputName"
                                                               value="{{$value['mobile_no']}}">
                                                        <span style="color: red">@error('mobile_no'){{$message}}@enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">@lang('messages.User Email'):</label>
                                                        <input type="text" name="email" class="form-control "
                                                               id="exampleInputName" placeholder="Enter User Email"
                                                               value="{{$value['email']}}">
                                                        <span style="color: red">@error('email'){{$message}}@enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">@lang('messages.Gender'):</label><br>

                                                        <input type="radio" name="gender" value="male"
                                                               {{old('gander')=="male" ? 'checked='.'"checked"' : '' }}  @if(isset($value)) {{ ($value->gender=="male")? "checked" : "" }} @endif checked="checked">@lang('messages.Male')
                                                        <input type="radio" name="gender" value="female"
                                                            {{old('gander')=="female" ? 'checked='.'"checked"' : '' }}  @if(isset($value)) {{ ($value->gender=="female")? "checked" : "" }} @endif>@lang('messages.Female')

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn" style="background-color: #4154f1">@lang('messages.Submit')</button>
                                            <a href="{{route('user.show')}}">
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




