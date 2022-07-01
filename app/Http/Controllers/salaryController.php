<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class salaryController extends Controller
{
    public function index()
    {
        $month = date('m');
        $trainer = DB::table('trainer_info')->where('status','1')->get();
        return view('Backend.User.Salary.add_salary',compact('trainer','month'));

    }
    public function getTrainerSalary(Request $request)
    {
        // echo $request->id;

        $salary = DB::table('trainer_info')->where('id',$request->id)->select('trainer_info.salary')->first();

        echo $salary->salary;
    }
    public function salaryStore(Request $request)
    {
        $validated = $request->validate([
            'date'=>'required',
            'month'=>'required',
            'year'=>'required',
            'trainer_id'=>'required',
            'ammount'=>'required',
        ]);

        $insert = DB::table('salary_info')
                  ->insert($request->except('_token','submit','admin_id'));

        if($insert)
        {

            $expense_info = DB::table('expense_infos')
                            ->insert([
                                'date'=>$request->date,
                                'expense_title_id'=>1000,
                                'ammount'=>$request->ammount,
                                'details'=>$request->comment,
                                'admin_id'=>$request->admin_id,
                            ]);


            return redirect()->back()->with('success','Data Insert Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Insert Unsuccessfull!');
        }
    }

    public function viewEmpSalary()
    {

        $trainer = DB::table('trainer_info')->where('status','1')->get();

        $salary_info = DB::table('salary_info')->get();

        

        $sl = 1;
        $year = date('Y');
        return view('Backend.User.Salary.view_salary',compact('trainer','salary_info','sl','year'));
    }
    public function getYearData(Request $request)
    {
        // return $request->yearly;
        $year = $request->yearly;
        $trainer = DB::table('trainer_info')->where('status','1')->get();

        $salary_info = DB::table('salary_info')->get();

    

        $sl = 1;
        // $year = date('Y');
        return view('Backend.User.Salary.year_wise_salary',compact('trainer','salary_info','sl','year'));
    }
    public function deleteSalary($id)
    {
        $delete = DB::table('salary_info')->where('id',$id)->delete();
        if($delete)
        {
            return redirect()->back()->with('success','Data Delete Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Delete Unsuccessfull');
        }
    }
}
