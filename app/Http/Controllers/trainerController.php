<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\course_info;

class trainerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $course = course_info::all();
        return view('Backend.User.TrainerInfo.add_trainer',compact('course'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
        'trainer_name' => 'required',
        'phone' => 'required|unique:trainer_info',
        'designation' => 'required',
        'salary' => 'required',
        // 'password_confirmation' => 'required|min:3',
    ]);

        $insert = DB::table('trainer_info')->insertGetId($request->except('_token','submit'));
        $insertImageNum = DB::table('trainer_info')->where('id',$insert)->update(['image'=>'1.jpg']);

        if($insert)
        {
            $file = $request->file('image');

            if($file)
            {
                $imageName = $insert.'.'.$file->getClientOriginalExtension();

                $file->move(public_path('Backend/Images/trainerImage'),$imageName);

                DB::table('trainer_info')->where('id',$insert)->update(['image'=>$imageName]);

            }

            return redirect()->back()->with('success','Data Insert Successfully!');
        }
        else
        {
            return redirect()->back()->with('error','Data Insert Unsuccessfully!');
        }
    }

    public function view()
    {
        $data = DB::table('trainer_info')
                ->join('course_infos','course_infos.id','=','trainer_info.course_id')
                ->select('trainer_info.*','course_infos.course_name')
                ->get();
        $sl=1;
        return view('Backend.User.TrainerInfo.view_trainer',compact('data','sl'));
    }

    public function edit($id)
    {
        $course = course_info::all();
        $data = DB::table('trainer_info')->where('id',$id)->first();
        return view('Backend.User.TrainerInfo.edit_trainer',compact('course','data'));
    }
    public function update(Request $request,$id)
    {

        $validated = $request->validate([
        'trainer_name' => 'required',
        'phone' => 'required',
        'designation' => 'required',
        'salary' => 'required',
        // 'password_confirmation' => 'required|min:3',
    ]);

    // $pathImage = DB::table('trainer_info')->where('id',$id)->first();

    $insert = DB::table('trainer_info')->where('id',$id)->update($request->except('_token','submit'));

    $file = $request->file('image');

    if($file)
    {
        $pathImage = DB::table('trainer_info')->where('id',$id)->first();

        $path = public_path('Backend/Images/trainerImage').$pathImage->image;

        if(file_exists($path))
        {
            unlink($path);
        }
    }

    if($file)
    {
       $imageName = $id.'.'.$file->getClientOriginalExtension();

        $file->move(public_path('Backend/Images/trainerImage'),$imageName);

        DB::table('trainer_info')->where('id',$id)->update(['image'=>$imageName]); 
    }

    if($insert)
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

        $trainer_check = DB::table('trainer_appoint')->where('trainer_id',$id)->get();
        $trainer_check1 = DB::table('salary_info')->where('trainer_id',$id)->get();
        if(count($trainer_check) > 0)
        {
            return redirect()->back()->with('error','This Trainer Have Student');
        }
        elseif(count($trainer_check1) > 0)
        {
            return redirect()->back()->with('error','This Trainer Have Salary Info');
        }
        else
        {
            $pathImage = DB::table('trainer_info')->where('id',$id)->first();

            $path = public_path('Backend/Images/trainerImage').$pathImage->image;

            if(file_exists($path))
            {
                unlink($path);
            }

            $delete = DB::table('trainer_info')->where('id',$id)->delete();
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
}
