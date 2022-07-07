<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\course_info;
use PDF;
// use App\Models\course_info;

class studentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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

            'unique_id'=>rand(),
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
        $insertImageNum = DB::table('student_info')->where('id',$insert)->update(['image'=>'1.jpg','due'=>$request->total_fee]);


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
        );
        // DB::table('student_info')->where('id',$id)->update(['image'=>'1.jpg']);
        // dd($array_data);

        DB::table('student_course_info')->where('student_id',$id)->delete();

        // $insert = DB::table('student_info')->where('id',$id)->update($array_data);

        for ($i=0; $i < count($request->course_id) ; $i++) 
        { 
            $insert_courseinfo = DB::table('student_course_info')
                                 ->insert([
                                    'student_id'=>$id,
                                    'course_id'=>$request->course_id[$i],
                                 ]);
        }

        $insert = DB::table('student_info')->where('id',$id)->update($array_data);

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

            // return $imageName;
        }
        

        // if($insert)
        // {
        
            return redirect()->back()->with('success','Student Data Update Successfully!');
        
        // else
        // {
        //     return redirect()->back()->with('error','Student Data Update Unsuccessfully!');
        // }

    }

    public function delete($id)
    {

        $trainer_check = DB::table('trainer_appoint')->where('student_id',$id)->get();
        $collection_check = DB::table('student_collection')->where('student_id',$id)->get();
        if(count($trainer_check) > 0)
        {
            return redirect()->back()->with('error','This Student Have Trainer');
        }
        elseif(count($collection_check) > 0)
        {
            return redirect()->back()->with('error','This Student Have Collection');
        }
        else
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

    public function idCard()
    {
        return view('Backend.User.StudentInfo.id_card');
    }
    public function details($id)
    {
        $data=DB::table('student_info')->where('id',$id)->first();
       return view('Backend.User.StudentInfo.details',compact('data')); 
    }

    public function completeCourse($id,$course_id)
    {
        $complete_date = date('d/m/Y');
        $update = DB::table('student_course_info')
                  ->where('student_id',$id)
                  ->where('course_id',$course_id)
                  ->update(['status'=>'1','complete_date'=>$complete_date,]);

        if($update)
        {
            return redirect()->back()->with('success','Course Completed...Get Certificate From The Button Given Below');
        }
        else
        {
            return redirect()->back()->with('error','Something Went Wrong');
        }
    }

    public function trainerSearch()
    {
        $student = DB::table('student_info')->get();
        return view('Backend.User.StudentInfo.trainer_search',compact('student'));
    }

    public function getTrainer(Request $request)
    {
        // return $request->id;

        $course_info = DB::table('student_course_info')
                        ->join('course_infos','course_infos.id','student_course_info.course_id')
                       ->where('student_id',$request->id)
                       ->select('course_infos.course_name','course_infos.id')
                       ->get();

        return view('Backend.User.StudentInfo.trainer_search_result',compact('course_info'));
    }

    public function trainerAppoint(Request $request)
    {
        // return $request->all();
        // dd($request->all());

        // return count($request->trainer_id);

        // return ;

        if(count($request->trainer_id) > count($request->course_id))
        {
           return redirect()->back()->with('error','Pleas Select One Trainer Per Course'); 
        }
        else
        {
            for ($i=0; $i < count($request->course_id) ; $i++) 
            { 
                $insert = DB::table('trainer_appoint')
                          ->insert([
                         'student_id'=>$request->student_id,
                            'course_id'=>$request->course_id[$i],
                            'trainer_id'=>$request->trainer_id[$i],
                     ]);
            }

            if($insert)
             {
                return redirect()->back()->with('success','Trainer Appoint Successfully');
             }
             else
             {
                return redirect()->back()->with('error','Trainer Appoint Failed');
             }
        }

        
    }

    public function viewStdTrainer()
    {
        $student = DB::table('student_info')->get();
        return view("Backend.User.StudentInfo.std_trainer",compact('student'));
    }

    public function getstdTrainer(Request $request)
    {
        $id = $request->id;

        $course_info = DB::table('trainer_appoint')
                        ->join('course_infos','course_infos.id','trainer_appoint.course_id')
                       ->where('student_id',$id)
                       ->select('course_infos.course_name','course_infos.id')
                       ->get();

        // dd($course_info);

        return view('Backend.User.StudentInfo.stdtrainer_search_result',compact('course_info','id'));
    }

    public function deleteAppTrainer($id)
    {
        $delete = DB::table('trainer_appoint')
                  ->where('student_id',$id)
                  ->delete();

        if($delete)
        {
            return redirect()->back()->with('success','Trainer Appoint Removed');
        }
        else
        {
            return redirect()->back()->with('error','Something Went Wrong!');
        }
    }

    public function downloadForm($id)
    {
        // $student_name = DB::table('student_info')->where('id',$id)->select('student_info.name')->get();

        $data = DB::table('student_info')->where('id',$id)->first();
        // // return $pdf
        $pdf = PDF::loadView('Backend.User.StudentInfo.form_download',compact('data'))
                ->setPaper('A4', 'portrait')
                ->setOptions([
                    'defaultFont' => 'sans-serif',
                     // 'enable_remote' => true,
                    // 'chroot'  => public_path('/public/Backend'),

            ]);

        // return view('Backend.User.StudentInfo.form_download',compact('data'));


        return $pdf->stream($data->name.'.pdf');
    }

    public function id_card($id)
    {
        $data = DB::table('student_info')->where('id',$id)->first();
        return view('Backend.User.StudentInfo.id_card',compact('data'));
    }

    public function download_id($id)
    {
       $data = DB::table('student_info')->where('id',$id)->first();
       
       $pdf = PDF::loadView('Backend.User.StudentInfo.id_download',compact('data'))
              ->setPaper('A4','portrait')
              ->setOptions([
                'defaultFont'=>'sans-serif',
              ]);

        return $pdf->download($data->name.'.pdf');
    }

    public function getCertificate($student_id,$course_id)
    {
        $data = DB::table('student_info')->where('id',$student_id)->first();
        $date = date('d/m/Y');
        return view('Backend.User.StudentInfo.certificate',compact('data','course_id','date'));
    }

    public function downloadCertificate($id,$course_id)
    {
       $data = DB::table('student_info')->where('id',$id)->first();

       $date = date('d/m/Y');
       
       $pdf = PDF::loadView('Backend.User.StudentInfo.certificate_download',compact('data','course_id','date'))
              ->setPaper('A4','landscape')
              ->setOptions([
                // 'defaultFont'=>'sans-serif',
              ]);

        // $oup

        return $pdf->download($data->name.'-certificate.pdf',array("Attachment" => 0));

       // return view('Backend.User.StudentInfo.certificate_download',compact('data','course_id','date'));
    }
}