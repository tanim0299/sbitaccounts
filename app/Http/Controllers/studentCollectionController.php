<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class studentCollectionController extends Controller
{
    public function index()
    {
        $student = DB::table('student_info')
                   ->get();
        return view('Backend.User.StudentCollection.add_stdcollection',compact('student'));
    }
    public function getStudentFee(Request $request)
    {
        $ammount = DB::table('student_info')
                    ->where('id',$request->id)
                    ->first();
                    
        echo $ammount->due;
    }
    public function store(Request $request)
    {   
        // dd($request->all());

        // return $request->

        $insert = DB::table('student_collection')
                  ->insert($request->except('_token','submit','total_due'));

        if($insert)
        {
            $paid_data = DB::table('student_collection')->where('student_id',$request->student_id)->sum('collection_ammount');

            DB::table('student_info')->where('id',$request->student_id)->update(['due'=>$request->due_ammount]);
            DB::table('student_info')->where('id',$request->student_id)->update(['paid'=>$paid_data]);

            return redirect()->back()->with('success','Student Collection Successfully Done!');
        }
        else
        {
            return redirect()->back()->with('error','Student Collection Unsuccessfully');
        }
    }
    public function view()
    {
        $data = DB::table('student_collection')
                ->join('student_info','student_info.id','=','student_collection.student_id')
                ->select('student_info.name','student_collection.*')
                ->get();
        $sl=1;
        return view('Backend.User.StudentCollection.view_stdcollection',compact('data','sl'));
    }
    public function delete($id,$student_id)
    {
        // return $id;
        $get_data = DB::table('student_info')
                        ->where('id',$student_id)
                        ->first();
        $paid_ammount = $get_data->paid;
        $due_ammount = $get_data->due;

        $get_presentammount = DB::table('student_collection')
                              ->where('id',$id)
                              ->first();

        $collection_ammount = $get_presentammount->collection_ammount;

        // return $collection_ammount;

        $newPaid_ammount = $paid_ammount - $collection_ammount;

        $newDue_ammount = $due_ammount + $collection_ammount;

        $setdata = DB::table('student_info')->where('id',$student_id)->update(['paid'=>$newPaid_ammount,'due'=>$newDue_ammount]);

        $delete = DB::table('student_collection')->where('id',$id)->delete();

        if($delete)
        {
            return redirect()->back()->with('success','Collection Delete Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Collection Delete Unsuccessfull');
        }
    }
}
