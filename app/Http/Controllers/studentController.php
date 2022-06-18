<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\course_info;
// use App\Models\course_info;

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
        // dd($request->all());
        $array_data = array(

            'date'=>$request->date,
            'type'=>$request->type,
            'name'=>$request->name,
            'fathers_name'=>$request->fathers_name,
            'mothers_name'=>$request->mothers_name,
            'gender'=>$request->gender,
            'nationality'=>$request->nationality,
            'religion'=>$request->religion,
            'institute'=>$request->institute,
            'group'=>$request->group,
            'semister'=>$request->semister,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'district'=>$request->district,
            'upazila'=>$request->upazila,
            'adress'=>$request->adress,
            'main_fee'=>$request->main_fee,
            'discount'=>$request->discount,
            'discount_per'=>$request->discount_per,
            'total_fee'=>$request->total_fee,
            'join_date'=>$request->join_date,
            'class_time'=>$request->class_time,
            'admin_id'=>$request->admin_id,
            'image'=>"1",
        );

        $insert = DB::table('student_info')->insertGetId($array_data);

        if($insert)
        {
            for ($i=0; $i < count($request->course_id) ; $i++) 
            { 
                $insert_courseinfo = DB::table('student_course_info')
                                     ->insert([
                                        'student_id'=>$insert,
                                        'course_id'=>$request->course_id[$i],
                                     ]);
            }


            $file = $request->file('image');

            if($file)
            {
                $imageName = $insert.'.'.$file->getClientOriginalExtension();

                $file->move(public_path('public/Backend/images/studentImage'),$imageName);

                DB::table('student_info')->where('id',$insert)->update(['image'=>$imageName]);
            }


            return redirect()->back()->with('success','Student Add Successfully!');

        }
        else
        {
            return redirect()->back()->with('error','Student Add Unsuccessfully!');
        }
    }

    public function view()
    {
        $data = DB::table('student_info')->get();
        $sl=1;
        return view('Backend.User.StudentInfo.view_student',compact('data','sl'));
    }

    public function showForm($id)
    {
        $data = DB::table('student_info')->where('id',$id)->first();
        return view("Backend.User.StudentInfo.student_form",compact('data'));
    }
    public function edit($id)
    {
        $data = DB::table('student_info')->where('id',$id)->first();
        $course = course_info::all()->where('status','1');
        return view("Backend.User.StudentInfo.edit_student",compact('data','course'));
    }

    public function update(Request $request,$id)
    {

        // dd($request->all());
        $array_data = array(

            'date'=>$request->date,
            'type'=>$request->type,
            'name'=>$request->name,
            'fathers_name'=>$request->fathers_name,
            'mothers_name'=>$request->mothers_name,
            'gender'=>$request->gender,
            'nationality'=>$request->nationality,
            'religion'=>$request->religion,
            'institute'=>$request->institute,
            'group'=>$request->group,
            'semister'=>$request->semister,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'district'=>$request->district,
            'upazila'=>$request->upazila,
            'adress'=>$request->adress,
            'main_fee'=>$request->main_fee,
            'discount'=>$request->discount,
            'discount_per'=>$request->discount_per,
            'total_fee'=>$request->total_fee,
            'join_date'=>$request->join_date,
            'class_time'=>$request->class_time,
            'admin_id'=>$request->admin_id,
            'image'=>"1",
        );

        // dd($array_data);

        DB::table('student_course_info')->where('student_id',$id)->delete();

        for ($i=0; $i < count($request->course_id) ; $i++) 
        { 
            $insert_courseinfo = DB::table('student_course_info')
                                 ->insert([
                                    'student_id'=>$id,
                                    'course_id'=>$request->course_id[$i],
                                 ]);
        }

        $insert = DB::table('student_info')->where('id',$id)->update($array_data);

        if($insert)
        {

        $file = $request->file('image');

        if($file)
        {
            $image_name = DB::table('student_info')->where('id',$id)->first();

            $path = base_path().'/public/public/Backend/images/studentImage/'.$image_name->image;

            if(file_exists($path))
            {
                unlink($path);
            }
        }

        if($file)
        {
            $imageName = $id.'.'.$file->getClientOriginalExtension();

            $file->move(public_path('public/Backend/images/studentImage'),$imageName);

            DB::table('student_info')->where('id',$id)->update(['image'=>$imageName]);
        }

        
            return redirect()->back()->with('success','Student Data Update Successfully!');
        }

    }

    public function delete($id)
    {
        DB::table('student_course_info')->where('student_id',$id)->delete();

        $pathImage = DB::table('student_info')->where('id',$id)->first();

        $path = base_path().'/public/public/Backend/images/studentImage/'.$pathImage->image;

        if(file_exists($path))
        {
            unlink($path);
        }

        DB::table("student_info")->where('id',$id)->delete();

        return redirect()->back()->with('success','Data Delete Successfully!');
    }
}
