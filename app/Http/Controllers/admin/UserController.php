<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.fields');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'mobile_no'=>'required',
            'profile_image'=>'required',
            'password'=>'required',
        ]);

        $input = $request->all();
        if ($request->hasFile("profile_image")) {
            $img = $request->file("profile_image");
            $img->store('public/profile_image');
            $input['profile_image'] = $img->hashName();
        }
        $input['password'] = Hash::make($request->password);
        $input['status'] = 'Active';
        User::create($input);
        return redirect()->route('user.show')->with(['success'=>'date Insert Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $value = User::all();
        return  view('admin.user.show',compact('value'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $value = User::find($id);
        return view('admin.user.edit',compact('value'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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
         return redirect()->route('user.show')->with(['success'=>'Data Update Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();

        return redirect()->route('user.show')->with(['danger'=>'User Destroy Successfully']);
    }

    public function status(Request $request){
//dd($request);
        $user = User::find($request->id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success'=>'Status change successfully.']);
    }
}
