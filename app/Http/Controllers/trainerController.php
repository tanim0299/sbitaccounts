<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\course_info;

class trainerController extends Controller
{
    public function index()
    {
        $course = course_info::all();
        return view('Backend.User.TrainerInfo.add_trainer',compact('course'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
        'name' => 'required',
        'phone' => 'required|unique:trainer_info',
        'designation' => 'required',
        // 'password_confirmation' => 'required|min:3',
    ]);

        $insert = DB::table('trainer_info')->insertGetId($request->except('_token','submit'));

        if($insert)
        {
            $file = $request->file('image');
            if($file)
            {
                $imageName = $insert.'.'.$file->getClientOriginalExtension();

                

            }
        }
    }
}
