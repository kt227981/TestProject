

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
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
                @php
                    $user = \Illuminate\Support\Facades\Auth::user();
                @endphp
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        @if($user->profile_image == '')
                            <img src="{{asset('storage/profile_image/user.png')}}" alt="Profile" class="rounded-circle" style="max-width: 120px;">
                         @else
                            <img src="{{asset('storage/profile_image/'.$user->profile_image)}}" alt="Profile" class="rounded-circle" style="max-width: 120px;">
                          @endif
                            <h2>{{$user->name}}</h2>
                        <div class="social-links mt-2">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-8" style="margin-top: -248px">



                <div class="card" style="margin-top: 249px;">
{{--                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqG_IrW41OWowRakdludbu-8KSLJLrXifvvyW3djZd&s" style="height: 257px">--}}

                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
{{--                        <ul class="nav nav-tabs nav-tabs-bordered">--}}


{{--                            <li class="nav-item">--}}
{{--                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>--}}
{{--                            </li>--}}


{{--                            <li class="nav-item">--}}
{{--                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>--}}
{{--                            </li>--}}

{{--                        </ul>--}}

                        <form method="post" action="{{route('user_profile.update',\Illuminate\Support\Facades\Auth::user()->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body" style="margin-top: 26px">
                                <div class="row">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">User Name: </label>
                                            <input type="text" name="name" class="form-control"
                                                   id="exampleInputName" placeholder="Enter User Name"
                                                   value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
                                            <span style="color: red">@error('first_name'){{$message}}@enderror</span>
                                        </div>

                                       <div class="row">
                                           <div class="col-md-6">
                                               <div class="form-group">
                                                   <label for="exampleInputEmail1">User Email:</label>
                                                   <input type="text" name="email" class="form-control "
                                                          id="exampleInputName" placeholder="Enter User Email"
                                                          value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                                                   <span style="color: red">@error('middle_name'){{$message}}@enderror</span>
                                               </div>
                                           </div>
                                           <div class="col-md-6">
                                               <div class="form-group">
                                                   <label for="exampleInputEmail1">Mobile Number: </label>
                                                   <input type="text" name="mobile_no" class="form-control"
                                                          id="exampleInputName" placeholder="Enter User Name"
                                                          value="{{\Illuminate\Support\Facades\Auth::user()->mobile_no}}">
                                                   <span style="color: red">@error('mobile_no'){{$message}}@enderror</span>
                                               </div>
                                           </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">User Profile Picture: </label>
                                            <input id="profile_image" type="file" class="form-control @error('profile_image') is-invalid @enderror" name="profile_image" value="{{ \Illuminate\Support\Facades\Auth::user()->profile_image }}"  autocomplete="profile_image" >
                                            <span style="color: red">@error('profile_image'){{$message}}@enderror</span>
                                        </div>
                                        <img src="{{asset('storage/profile_image/'.\Illuminate\Support\Facades\Auth::user()->profile_image)}}" height="70px" width="70px" alt="user" style="border-radius: 41px">
                                    </div>

                                           <div class="col-md-6">
                                               <div class="form-group">
                                                   <label for="exampleInputEmail1">Gender:</label><br>
                                                   <input type="radio" name="gender" value="male"
                                                          {{old('gander')=="male" ? 'checked='.'"checked"' : '' }}   {{ (\Illuminate\Support\Facades\Auth::user()->gender=="male")? "checked" : "" }}  checked="checked">Male
                                                   <input type="radio" name="gender" value="female"
                                                       {{old('gander')=="female" ? 'checked='.'"checked"' : '' }} {{ (\Illuminate\Support\Facades\Auth::user()->gender=="female")? "checked" : "" }} >Female

{{--                                                   <input type="radio" name="gender" value="male" checked> Male <br>--}}
{{--                                                   <input type="radio" name="gender" value="female"> Female<br>--}}
                                               </div>
                                           </div>
                                           <div class="card-footer">
                                               <button type="submit" class="btn btn" style="background-color: #4154f1">Update</button>
                                           </div>
                                    </div>
                                </div>
                            </div>
                        </form>



                        <div class="tab-content pt-2">



                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form>
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="assets/img/profile-img.jpg" alt="Profile">
                                            <div class="pt-2">
                                                <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                                <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="fullName" type="text" class="form-control" id="fullName" value="Kevin Anderson">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="about" class="form-control" id="about" style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="company" type="text" class="form-control" id="company" value="Lueilwitz, Wisoky and Leuschke">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="job" type="text" class="form-control" id="Job" value="Web Designer">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="country" type="text" class="form-control" id="Country" value="USA">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="address" type="text" class="form-control" id="Address" value="A108 Adam Street, New York, NY 535022">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="text" class="form-control" id="Phone" value="(436) 486-3538 x29071">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="Email" value="k.anderson@example.com">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="twitter" type="text" class="form-control" id="Twitter" value="https://twitter.com/#">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="facebook" type="text" class="form-control" id="Facebook" value="https://facebook.com/#">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="instagram" type="text" class="form-control" id="Instagram" value="https://instagram.com/#">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="linkedin" type="text" class="form-control" id="Linkedin" value="https://linkedin.com/#">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-settings">

                                <!-- Settings Form -->
                                <form>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                                        <div class="col-md-8 col-lg-9">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="changesMade" checked>
                                                <label class="form-check-label" for="changesMade">
                                                    Changes made to your account
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="newProducts" checked>
                                                <label class="form-check-label" for="newProducts">
                                                    Information on new products and services
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="proOffers">
                                                <label class="form-check-label" for="proOffers">
                                                    Marketing and promo offers
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                                                <label class="form-check-label" for="securityNotify">
                                                    Security alerts
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End settings Form -->

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form>

                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" class="form-control" id="currentPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword" type="password" class="form-control" id="newPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection
