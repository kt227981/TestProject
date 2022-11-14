<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Account;
use App\Models\admin\Transfer;
use App\Models\User;
use Illuminate\Http\Request;

class TransferController extends Controller
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
        $user_id = User::all();
        $to_Account_id = Account::all();
        $from_Account_id = Account::all();
        return view('admin.transfer.fields',compact('user_id','to_Account_id','from_Account_id'));
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
            'date'=>'required',
            'amount'=>'required',
            'remark'=>'required',
        ]);

        $input = $request->all();
        Transfer::create($input);
        return redirect()->route('transfer/show')->with(['success'=>'Data Insert Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $value = Transfer::all();
        return view('admin.transfer.show',compact('value'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $value = Transfer::find($id);
        $user_id = User::all();
        $to_account_id = Account::all();
        $from_account_id = Account::all();
        return view('admin.transfer.edit',compact('value','user_id','to_account_id','from_account_id'));
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
        $data = Transfer::find($id);
        $data->update($input);
        return redirect()->route('transfer/show')->with(['success'=>'Data Update Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Transfer::find($id);
        $data->delete();
        return redirect()->route('transfer/show')->with(['danger'=>'Data Delete Successfully']);
    }
}
