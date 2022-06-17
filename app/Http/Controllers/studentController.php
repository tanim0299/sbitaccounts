<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\course_info;

class studentController extends Controller
{
    public function index()
    {
        $course = course_info::all()->where('status','1');
        return view('Backend.User.StudentInfo.add_student',compact('course'));
    }

    public function getCourseFee(Request $request)
    {
        $course_fee = course_info::find($request->id);

        $total_value = $course_fee->course_fee+$request->p_value;

        // return view("Backend.User.StudentInfo.course_fee",compact('total_value')); 

        echo $total_value; 
    }

    public function subCourseFee(Request $request)
    {
        $course_fee = course_info::find($request->id);

        $total_value = $request->p_value-$course_fee->course_fee;

        // return view("Backend.User.StudentInfo.course_fee",compact('total_value')); 

        echo $total_value; 
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
