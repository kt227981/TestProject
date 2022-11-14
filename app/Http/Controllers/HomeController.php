<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');

    }

    public function cache_clear(){
        Artisan::call('optimize:clear');
        return \redirect()->route('home')->with(['success'=>'Cache Cleared']);
    }

    public function profile(){
        return view('admin.user_profile.profile');
    }

    public function password(){
        return view('admin.user_profile.password');
    }

    public function profile_update(Request $request,$id){

        $input = $request->all();
        $data = User::find($id);

        if ($request->hasFile("profile_image")) {
            $img = $request->file("profile_image");
            if (Storage::exists('public/profile_image' . $data->profile_image)) {
                Storage::delete('public/profile_image' . $data->profile_image);
            }
            $img->store('public/profile_image');
            $input['profile_image'] = $img->hashName();
        }
        $data->update($input);
        return redirect()->route('profile')->with(['success'=>'Data Update Successfully']);
    }

}
