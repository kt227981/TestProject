<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Account;
use App\Models\admin\Category;
use App\Models\admin\Expenses;

use App\Models\User;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = User::all();
        $category_id = Category::all();
        $account_id = Account::all();

        return view('admin.expenses.fields',compact('user_id','category_id','account_id'));
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
            'amount'=>'required',
            'date'=>'required',
            'remark'=>'required',
        ]);

        $input = $request->all();
        Expenses::create($input);
        return redirect()->route('expenses/show')->with(['success' => 'Data Insert Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $value= Expenses::all();
        return view('admin.expenses.show',compact('value'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $value = Expenses::find($id);
        $user_id = User::all();
        $account_id = Account::all();
        $category_id = Category::all();
        return view('admin.expenses.edit',compact('value','user_id','account_id','category_id'));
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
        $data = Expenses::find($id);
        $data->update($input);
        return redirect()->route('expenses/show')->with(['success'=>'Data Update Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Expenses::find($id);
        $data->delete();
        return redirect()->route('expenses/show')->with(['danger'=>'Data Delete Successfully']);
    }
}
