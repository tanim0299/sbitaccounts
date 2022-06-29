<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\expensetitle_info;
use NumberToWords\NumberToWords;

class expenseController extends Controller
{
    public function addExpenseTitle()
    {
        $data = expensetitle_info::all();
        return view('Backend.User.ExpenseInfo.add_expense_title',compact('data'));
    }
    public function expenseTitleStore(Request $request)
    {
        $validated = $request->validate([
            'sl'=>'required',
            'expense_title'=>'required',
        ]);

        $insert = expensetitle_info::create($request->except('_token','submit'));

        if($insert)
        {
            return redirect()->back()->with('success','Data Insert Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Insert Unsuccessfull');
        }

    }
    public function editExpenseTitle($id)
    {
        $data = expensetitle_info::find($id)->first();
        return view('Backend.User.ExpenseInfo.edit_expense_title',compact('data'));
    }
    public function expenseTitleUpdate(Request $request,$id)
    {
        $validated = $request->validate([
            'sl'=>'required',
            'expense_title'=>'required',
        ]);

        $insert = expensetitle_info::find($id)->update($request->except('_token','submit'));
        if($insert)
        {
            return redirect()->back()->with('success','Data Update Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Update Unsuccessfull');
        }

    }

    public function deleteExpenseTitle($id)
    {
        $delete = expensetitle_info::find($id)->delete();
        if($delete)
        {
            return redirect()->back()->with('success','Data Delete Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Delete Unsuccessfull');
        }
    }
    public function add_expense()
    {
        $expense_title = expensetitle_info::where('status','1')->get();
        return view('Backend.User.ExpenseInfo.add_expense',compact('expense_title'));
    }
    public function expenseStore(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'date'=>'required',
            'ammount'=>'required'
        ]);

        $insert = DB::table('expense_infos')
                  ->insertGetId($request->except('_token','submit'));

        if($insert)
        {
            return redirect()->back()->with('success','Data Insert Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Insert Unsuccessfull');
        }
    }
    public function view_expense()
    {
        $data = DB::table('expense_infos')
                ->join('expensetitle_info','expensetitle_info.id','=','expense_infos.expense_title_id')
                ->select('expense_infos.*','expensetitle_info.expense_title')
                ->get();

        $sl=1;
        return view('Backend.User.ExpenseInfo.view_expense',compact('data','sl'));
    }
    public function edit_expense($id)
    {
        $data = DB::table('expense_infos')
                ->where('id',$id)
                ->first();
        $expense_title = expensetitle_info::where('status','1')->get();
        return view('Backend.User.ExpenseInfo.edit_expense',compact('data','expense_title'));
    }
    public function expenseUpdate(Request $request,$id)
    {
        $validated = $request->validate([
            'date'=>'required',
            'ammount'=>'required'
        ]);

        $insert = DB::table('expense_infos')
                  ->where('id',$id)
                  ->update($request->except('_token','submit'));
        if($insert)
        {
            return redirect()->back()->with('success','Data Update Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Update Unsuccessfully');
        }
    }
    public function expense_report()
    {
        return view('Backend.User.ExpenseInfo.expense_report');
    }
    public function showExpenseReport(Request $request)
    {
        $type = $request->report_type;

        if($type == 'All')
        {
            $data = DB::table('expense_infos')
                    ->join('expensetitle_info','expensetitle_info.id','=','expense_infos.expense_title_id')
                    ->select('expense_infos.*','expensetitle_info.expense_title')
                    ->orderBy('date','ASC')
                    ->get();
            $total = DB::table('expense_infos')->sum('ammount');
            $sl = 1;
            return view('Backend.User.ExpenseInfo.expense_reporttab',compact('data','total','sl','type'));
        }
        elseif($type == 'Daily')
        {
            $date = $request->date;
            $data = DB::table('expense_infos')
                    ->where('date',$request->date)
                    ->join('expensetitle_info','expensetitle_info.id','=','expense_infos.expense_title_id')
                    ->select('expense_infos.*','expensetitle_info.expense_title')
                    ->orderBy('date','ASC')
                    ->get();
            $total = DB::table('expense_infos')
                    ->where('date',$request->date)
                    ->sum('ammount');
            $sl = 1;
            return view('Backend.User.ExpenseInfo.expense_reporttab',compact('data','total','sl','type','date'));
        }
        elseif($type == 'Date_to_Date')
        {
            $from_date = $request->from_date;
            $to_date = $request->to_date;
            $data = DB::table('expense_infos')
                    ->whereBetween('date',[$request->from_date,$request->to_date])
                    ->join('expensetitle_info','expensetitle_info.id','=','expense_infos.expense_title_id')
                    ->select('expense_infos.*','expensetitle_info.expense_title')
                    ->orderBy('date','ASC')
                    ->get();
            $total = DB::table('expense_infos')
                    ->whereBetween('date',[$request->from_date,$request->to_date])
                    ->sum('ammount');
            $sl = 1;
            return view('Backend.User.ExpenseInfo.expense_reporttab',compact('data','total','sl','type','from_date','to_date'));
        }
        elseif($type == 'Monthly')
        {
            $monthNum = $request->month;

            $monthName = date('F', mktime(0, 0, 0, $monthNum, 10));

            $year = $request->year;
            $data = DB::table('expense_infos')
                    ->whereMonth('date',$request->month)
                    ->whereYear('date',$request->year)
                    ->join('expensetitle_info','expensetitle_info.id','=','expense_infos.expense_title_id')
                    ->select('expense_infos.*','expensetitle_info.expense_title')
                    ->orderBy('date','ASC')
                    ->get();
            $total = DB::table('expense_infos')
                    ->whereMonth('date',$request->month)
                    ->whereYear('date',$request->year)
                    ->sum('ammount');
            $sl = 1;
            return view('Backend.User.ExpenseInfo.expense_reporttab',compact('data','total','sl','type','monthName','year'));
        }
        elseif($type == 'Yearly')
        {
            $year = $request->yearly_year;
            $data = DB::table('expense_infos')
                    ->whereYear('date',$request->yearly_year)
                    ->join('expensetitle_info','expensetitle_info.id','=','expense_infos.expense_title_id')
                    ->select('expense_infos.*','expensetitle_info.expense_title')
                    ->orderBy('date','ASC')
                    ->get();
            $total = DB::table('expense_infos')
                    ->whereYear('date',$request->yearly_year)
                    ->sum('ammount');
            $sl = 1;
            return view('Backend.User.ExpenseInfo.expense_reporttab',compact('data','total','sl','type','year'));
        }
    }
}
