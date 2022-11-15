<?php

namespace App\Http\Controllers\admin;

use App\Exports\ExportCategory;
use App\Http\Controllers\Controller;
use App\Imports\ImportCategory;
use App\Models\admin\Category;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;


class CategoryController extends Controller
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
        return view('admin.category.fields');
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
            'icon'=>'required',
        ]);

        $input = $request->all();
        $input['status'] = 'Active';
        Category::create($input);
        return redirect()->route('category.show')->with(['success'=>'Data Insert Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $value = Category::all();
        return view('admin.category.show',compact('value'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $value = Category::find($id);
        return view('admin.category.edit',compact('value'));
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
        $data = Category::find($id);
         $data->update($input);
         return redirect()->route('category.show')->with(['success'=>'Data Update Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Category::find($id);
        $destroy->delete();
        return redirect()->route('category.show')->with(['danger'=>'data Delete Successfully']);
    }

    public function status(Request $request){
//dd($request);
        $user = Category::find($request->id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success'=>'Status change successfully.']);
    }


//    public function import(Request $request){
//        Excel::import(new ImportCategory(), $request->file('file')->store('temp'));
//        return back();
//    }
//
//    public function export(){
//
//        return Excel::download(new ExportCategory(), 'category-collection.xlsx');
//
//    }




}
