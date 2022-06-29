<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class statementController extends Controller
{
    public function index()
    {
        return view('Backend.User.Statement.statement');
    }
    public function showStatement(Request $request)
    {
        $type = $request->report_type;
        // return $type;

        if($type == 'All')
        {
            $income = DB::table('income_info')
                      ->join('incometitle_info','income_info.income_title_id','=','incometitle_info.id')
                      ->select('incometitle_info.income_title','income_info.*')
                      ->orderBy('date','ASC')
                      ->get();

            $expense = DB::table('expense_infos')
                      ->join('expensetitle_info','expense_infos.expense_title_id','=','expensetitle_info.id')
                      ->select('expensetitle_info.expense_title','expense_infos.*')
                      ->orderBy('date','ASC')
                      ->get();

            $total_income = DB::table('income_info')
                            ->sum('ammount');

            $total_expense = DB::table('expense_infos')
                            ->sum('ammount');

            $result = '';

            if($total_income == $total_expense)
            {
                $result.='Balanced';
            }
            elseif($total_income > $total_expense)
            {
                $result.='Profit';
            }
            else
            {
                $result.='Loss';
            }

            // return $result;

            return view('Backend.User.Statement.reporttab',compact('income','expense','total_income','total_expense','type','result'));
        }
        elseif($type == 'Daily')
        {
            $date = $request->date;
            $income = DB::table('income_info')
                      ->where('date',$request->date)
                      ->join('incometitle_info','income_info.income_title_id','=','incometitle_info.id')
                      ->select('incometitle_info.income_title','income_info.*')
                      ->orderBy('date','ASC')
                      ->get();

            $expense = DB::table('expense_infos')
                      ->where('date',$request->date)
                      ->join('expensetitle_info','expense_infos.expense_title_id','=','expensetitle_info.id')
                      ->select('expensetitle_info.expense_title','expense_infos.*')
                      ->orderBy('date','ASC')
                      ->get();

            $total_income = DB::table('income_info')
                      ->where('date',$request->date)
                            ->sum('ammount');

            $total_expense = DB::table('expense_infos')
                      ->where('date',$request->date)
                            ->sum('ammount');

            $result = '';

            if($total_income == $total_expense)
            {
                $result.='Balanced';
            }
            elseif($total_income > $total_expense)
            {
                $result.='Profit';
            }
            else
            {
                $result.='Loss';
            }

            // return $result;

            return view('Backend.User.Statement.reporttab',compact('income','expense','total_income','total_expense','type','result','date'));
        }
        elseif($type == 'Date_to_Date')
        {

            $from_date = $request->from_date;
            $to_date = $request->to_date;

            $income = DB::table('income_info')
                      ->whereBetween('date',[$request->from_date,$request->to_date])
                      ->join('incometitle_info','income_info.income_title_id','=','incometitle_info.id')
                      ->select('incometitle_info.income_title','income_info.*')
                      ->orderBy('date','ASC')
                      ->get();

            $expense = DB::table('expense_infos')
                      ->whereBetween('date',[$request->from_date,$request->to_date])
                      ->join('expensetitle_info','expense_infos.expense_title_id','=','expensetitle_info.id')
                      ->select('expensetitle_info.expense_title','expense_infos.*')
                      ->orderBy('date','ASC')
                      ->get();

            $total_income = DB::table('income_info')
                            ->whereBetween('date',[$request->from_date,$request->to_date])
                            ->sum('ammount');

            $total_expense = DB::table('expense_infos')
                            ->whereBetween('date',[$request->from_date,$request->to_date])
                            ->sum('ammount');

            $result = '';

            if($total_income == $total_expense)
            {
                $result.='Balanced';
            }
            elseif($total_income > $total_expense)
            {
                $result.='Profit';
            }
            else
            {
                $result.='Loss';
            }

            // return $result;

            return view('Backend.User.Statement.reporttab',compact('income','expense','total_income','total_expense','type','result','from_date','to_date'));
        }

        elseif($type == 'Monthly')
        {

            $monthNum = $request->month;

            $monthName = date('F', mktime(0, 0, 0, $monthNum, 10));

            $year = $request->year;

            $income = DB::table('income_info')
                      ->whereMonth('date',$request->month)
                      ->whereYear('date',$request->year)
                      ->join('incometitle_info','income_info.income_title_id','=','incometitle_info.id')
                      ->select('incometitle_info.income_title','income_info.*')
                      ->orderBy('date','ASC')
                      ->get();

            $expense = DB::table('expense_infos')
                      ->whereMonth('date',$request->month)
                      ->whereYear('date',$request->year)
                      ->join('expensetitle_info','expense_infos.expense_title_id','=','expensetitle_info.id')
                      ->select('expensetitle_info.expense_title','expense_infos.*')
                      ->orderBy('date','ASC')
                      ->get();

            $total_income = DB::table('income_info')
                            ->whereMonth('date',$request->month)
                            ->whereYear('date',$request->year)
                            ->sum('ammount');

            $total_expense = DB::table('expense_infos')
                            ->whereMonth('date',$request->month)
                            ->whereYear('date',$request->year)
                            ->sum('ammount');

            $result = '';

            if($total_income == $total_expense)
            {
                $result.='Balanced';
            }
            elseif($total_income > $total_expense)
            {
                $result.='Profit';
            }
            else
            {
                $result.='Loss';
            }

            // return $result;

            return view('Backend.User.Statement.reporttab',compact('income','expense','total_income','total_expense','type','result','monthName','year'));
        }
        elseif($type == 'Yearly')
        {


            $year = $request->yearly_year;

            $income = DB::table('income_info')
                      ->whereYear('date',$request->yearly_year)
                      ->join('incometitle_info','income_info.income_title_id','=','incometitle_info.id')
                      ->select('incometitle_info.income_title','income_info.*')
                      ->orderBy('date','ASC')
                      ->get();

            $expense = DB::table('expense_infos')
                      ->whereYear('date',$request->yearly_year)
                      ->join('expensetitle_info','expense_infos.expense_title_id','=','expensetitle_info.id')
                      ->select('expensetitle_info.expense_title','expense_infos.*')
                      ->orderBy('date','ASC')
                      ->get();

            $total_income = DB::table('income_info')
                            ->whereYear('date',$request->yearly_year)
                            ->sum('ammount');

            $total_expense = DB::table('expense_infos')
                            ->whereYear('date',$request->yearly_year)
                            ->sum('ammount');

            $result = '';

            if($total_income == $total_expense)
            {
                $result.='Balanced';
            }
            elseif($total_income > $total_expense)
            {
                $result.='Profit';
            }
            else
            {
                $result.='Loss';
            }

            // return $result;

            return view('Backend.User.Statement.reporttab',compact('income','expense','total_income','total_expense','type','result','year'));
        }
    }
}
