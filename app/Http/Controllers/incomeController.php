<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\incometitle_info;
use PDF;

class incomeController extends Controller
{
    public function index()
    {
        $data = incometitle_info::get();
        return view('Backend.User.IncomeInfo.add_income_title',compact('data'));
    }
    public function store(Request $request)
    {
        // dd($request->all());

        $validated = $request->validate([
            'sl'=>'required',
            'income_title'=>'required',
        ]);

        $insert = incometitle_info::create($request->except('_token','submit'));

        if($insert)
        {
            return redirect()->back()->with('success','Data Insert Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Insert Unsuccessfull');
        }

    }
    public function edit($id)
    {
        $data = incometitle_info::find($id)->first();
        return view('Backend.User.IncomeInfo.edit_income_title',compact('data'));
    }
    public function update(Request $request,$id)
    {
        $update = incometitle_info::find($id)->update($request->except('_token','submit'));

        if($update)
        {
            return redirect()->back()->with('success','Data Update Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Update Unsuccessfull');
        }
    }

    public function delete($id)
    {
        $delete = incometitle_info::find($id)->delete();
        if($delete)
        {
            return redirect()->back()->with('success','Data Delete Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Delete Unsuccessfull');
        }
    }

    public function addIncome()
    {
        $income_title = incometitle_info::where('status','1')->get();
        return view('Backend.User.IncomeInfo.add_income',compact('income_title'));
    }
    public function incomeStore(Request $request)
    {
        $validated = $request->validate([
            'sl'=>'required',
            'income_title'=>'required',
        ]);
        
    }
}
