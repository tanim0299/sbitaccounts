<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\course_info;

class courseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('Backend.User.CourseInfo.add_course');
    }

    public function store(Request $request)
    {
            $validated = $request->validate([
            'sl' => 'required',
            'course_name' => 'required',
            'course_fee' => 'required',
        ]);

        $insert = course_info::create($request->except('_token','submit'));
        if($insert)
        {
            return redirect()->back()->with('success','Course Add Successfully!');
        }
        else
        {
            return redirect()->back()->with('error','Course Add Failed!');
        }


    }

    public function view()
    {
        $data = course_info::all();
        return view('Backend.User.CourseInfo.view_course',compact('data'));
    }

    public function edit($id)
    {
        $data = course_info::find($id);
        return view('Backend.User.CourseInfo.edit_course',compact('data'));
    }

    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'sl' => 'required',
            'course_name' => 'required',
            'course_fee' => 'required',
        ]);

        $insert = course_info::find($id)->update($request->except('_token','submit'));

        if($insert)
        {
            return redirect()->back()->with('success','Course Update Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Course Update Failed');
        }
    }

    public function delete($id)
    {
        $delete = course_info::find($id)->delete();
        if($delete)
        {
            return redirect()->back()->with('success','Course Delete Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Course Delete Failed');
        }
    }
}
