<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\incometitle_info;
use App\Models\income_info;
use PDF;
use NumberToWords\NumberToWords;

class incomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
            'date'=>'required',
            'ammount'=>'required',
            'recived_from'=>'required',
        ]);

        $insert = income_info::create($request->except('_token','submit'));

        if($insert)
        {
            $id = $insert->id;
            $data = income_info::find($id)
                    ->join('incometitle_info','incometitle_info.id','=','income_info.income_title_id')
                    ->first();
        $sl=1;

        $numberToWords = new NumberToWords();

        // $numberTransformer->toWords(5120);

        $numberTransformer = $numberToWords->getNumberTransformer('en');

        $ammount_word = $numberTransformer->toWords($data->ammount);


        return redirect('income_voucher/'.$id);
        }
        else
        {
            return redirect()->back()->with('error','Data Insert Unsuccessfull');
        }

    }
    public function voucher($id)
    {

        $data = DB::table('income_info')
                ->where('income_info.id',$id)
                ->join('incometitle_info','incometitle_info.id','=','income_info.income_title_id')
                ->select('income_info.*','incometitle_info.income_title')
                ->first();


        // dd($data);

        $sl=1;

        $numberToWords = new NumberToWords();

        // $numberTransformer->toWords(5120);

        $numberTransformer = $numberToWords->getNumberTransformer('en');

        $ammount_word = $numberTransformer->toWords($data->ammount);

        return view('Backend.User.IncomeInfo.voucher',compact('sl','data','ammount_word'));
    }
    public function viewIncome()
    {
        $data = DB::table('income_info')
                ->join('incometitle_info','incometitle_info.id','=','income_info.income_title_id')
                ->select('income_info.*','incometitle_info.income_title')->get();
        $sl=1;
        return view('Backend.User.IncomeInfo.view_income',compact('data','sl'));
    }
    public function editIncome($id)
    {
        $income_title = incometitle_info::where('status','1')->get();
        $data = income_info::find($id);

        return view('Backend.User.IncomeInfo.edit_income',compact('data','income_title')); 
    }
    public function incomeUpdate(Request $request,$id)
    {
        $insert = income_info::find($id)->update($request->except('_token','submit'));

        if($insert)
        {
            return redirect()->back()->with('success','Data Update Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Unsuccessfull');
        }
    }
    public function delete_income($id)
    {   

        $collection_std_check = DB::table('income_info')
                                ->where('id',$id)
                                ->first();

        if($collection_std_check->std_collection_id == 1000)
        {
           $studentinfo = DB::table('student_collection')
                       ->where('income_id',$id)
                       ->first();

            $get_data = DB::table('student_info')
                            ->where('id',$studentinfo->student_id)
                            ->first();
            $paid_ammount = $get_data->paid;
            $due_ammount = $get_data->due;

            $get_presentammount = DB::table('student_collection')
                                  ->where('id',$studentinfo->id)
                                  ->first();

            $collection_ammount = $get_presentammount->collection_ammount;

            // return $collection_ammount;

            $newPaid_ammount = $paid_ammount - $collection_ammount;

            $newDue_ammount = $due_ammount + $collection_ammount;

            $setdata = DB::table('student_info')->where('id',$studentinfo->student_id)->update(['paid'=>$newPaid_ammount,'due'=>$newDue_ammount]);

            $delete_student_collection = DB::table('student_collection')->where('income_id',$id)->delete();
        

         
        }


        






        $delete = income_info::find($id)->delete();
        if($delete)
        {
            return redirect()->back()->with('success','Data Delete Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Delete Unsuccessfull');
        }
    }
    public function incomeReport()
    {
        return view('Backend.User.IncomeInfo.income_report');
    }
    public function showReport(Request $request)
    {
        // dd($request->all());

        $type = $request->report_type;

        if($type == 'All')
        {
            $data =DB::table('income_info')
                ->join('incometitle_info','incometitle_info.id','=','income_info.income_title_id')
                ->select('income_info.*','incometitle_info.income_title')
                ->orderBy('date','ASC')
                ->get();

            $total = DB::table('income_info')
                    ->sum('ammount');

            $sl=1;  
            return view("Backend.User.IncomeInfo.income_reporttab",compact('data','type','sl','total'));
        }
        elseif($type == 'Daily')
        {
            $date = $request->date;
            $validated = $request->validate([
                'date'=>'required',
            ]);
            $date = $request->date;

            // return $date;
            $data =DB::table('income_info')
                ->where('date',$date)
                ->join('incometitle_info','incometitle_info.id','=','income_info.income_title_id')
                ->select('income_info.*','incometitle_info.income_title')
                ->orderBy('date','ASC')
                ->get();
            $total = DB::table('income_info')
                    ->where('date',$date)
                    ->sum('ammount');

            $sl=1;  
            return view("Backend.User.IncomeInfo.income_reporttab",compact('data','type','sl','total','date'));

        }
        elseif($type == 'Date_to_Date')
        {
            $validated = $request->validate([
                'from_date'=>'required',
                'to_date'=>'required',
            ]);

            $from_date = $request->from_date;
            $to_date = $request->to_date;

            $data =DB::table('income_info')
                ->whereBetween('date',[$request->from_date,$request->to_date])
                ->join('incometitle_info','incometitle_info.id','=','income_info.income_title_id')
                ->select('income_info.*','incometitle_info.income_title')
                ->orderBy('date','ASC')
                ->get();

            $total = DB::table('income_info')
                    ->whereBetween('date',[$request->from_date,$request->to_date])
                    ->sum('ammount');

            $sl=1;  
            return view("Backend.User.IncomeInfo.income_reporttab",compact('data','type','sl','total','from_date','to_date'));

        }
        elseif($type == 'Monthly')
        {

            $monthNum = $request->month;

            $monthName = date('F', mktime(0, 0, 0, $monthNum, 10));

            $year = $request->year;
            // return $request->year;
            $data =DB::table('income_info')
                ->join('incometitle_info','incometitle_info.id','=','income_info.income_title_id')
                ->select('income_info.*','incometitle_info.income_title')
                ->whereMonth('income_info.date',$request->month)
                ->whereYear('income_info.date',$request->year)
                ->orderBy('date','ASC')
                ->get();

            $total = DB::table('income_info')
                    ->whereMonth('income_info.date',$request->month)    
                    ->whereYear('income_info.date',$request->yearly_year)
                    ->sum('ammount');

                // dd($data);
            $sl=1;  
            return view("Backend.User.IncomeInfo.income_reporttab",compact('data','type','sl','total','monthName','year'));
        }
        elseif($type == 'Yearly')
        {
            $year = $request->yearly_year;
            $data =DB::table('income_info')
                ->join('incometitle_info','incometitle_info.id','=','income_info.income_title_id')
                ->select('income_info.*','incometitle_info.income_title')
                ->whereYear('income_info.date',$request->yearly_year)
                ->orderBy('date','ASC')
                ->get();

            $total = DB::table('income_info')
                    ->whereYear('income_info.date',$request->yearly_year)
                    ->sum('ammount');

            // return $total;

                // dd($data);
            $sl=1;  
            return view("Backend.User.IncomeInfo.income_reporttab",compact('data','type','sl','total','year'));
        }


    }
}
