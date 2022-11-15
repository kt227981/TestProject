<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Account;
use App\Models\admin\Expenses;
use App\Models\admin\Income;
use App\Models\admin\Transfer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class ReportController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

//        $income = Incomes::where('user_id', $request->user_id)->whereDate('date', '>=', $start)->whereDate('date', '<=', $end)->where('account_id', $user_account->id)->select('id', 'user_id', 'date', 'amount', 'category_id', 'account_id', 'remark', DB::raw("'incomes' AS `type`"))->with('account')->with('users')->orderBy('date','ASC')->get();
//        $expense = Expenses::where('user_id', $request->user_id)->whereDate('date', '>=', $start)->whereDate('date', '<=', $end)->where('account_id', $user_account->id)->select('id', 'user_id', 'date', 'amount', 'category_id', 'account_id', 'remark', DB::raw("'expenses' AS `type`"))->with('account')->with('users')->orderBy('date','ASC')->get();
//        $transfer = Transfer::where('user_id', $request->user_id)->whereDate('date', '>=', $start)->whereDate('date', '<=', $end)->where('from_account_id', $user_account->id)->orWhere('to_account_id', $user_account->id)->select('id', 'user_id', 'date', 'amount', 'remark','from_account_id','to_account_id', DB::raw("'transfer' AS `type`"))->orderBy('date','ASC')->with('users')->get();
//        $query = collect($income)->merge(collect($expense));
//        $querys = collect($query)->merge(collect($transfer));
//        $reports = $querys->groupBy('date');


        $income = Income::pluck('amount');
        $expenses = Expenses::pluck('amount');
         $transfer = Transfer::pluck('amount');
//        $account = Account::pluck('amount');
//        $user = User::pluck('name');
       $total = $income->merge($expenses)->merge($transfer);
//        dd($total);


        return view('admin.report.show',compact('total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
