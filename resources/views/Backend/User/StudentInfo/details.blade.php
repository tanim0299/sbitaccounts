@extends('Backend.Layouts.master')
@section('body')
<style type="text/css">
    .course_info {
    margin-top: 26px;
}
.badge{
    font-size: 15px;
}
</style>
<div class="pcoded-content">

<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<!-- <i class="feather icon-home bg-c-blue"></i> -->
<div class="d-inline">
<h5>View Student Details</h5>
<!-- <span>This Is SBIT Dashboard</span> -->
<!-- <div class="links" style="margin-top: 20px;">
    <a href="{{url('addStudent')}}" class="btn btn-outline-info">Add Student</a>
</div> -->
</div>
</div>
</div>

</div>
</div>

<div class="pcoded-inner-content">
<div class="main-body">
<div class="page-wrapper">
<div class="page-body">
 
 <!-- //body content goes here -->
 <div class="form-body">
    <div class="card">
        <!-- <div class="card-header">
             <h5>View Student</h5>
        </div> -->
        <div class="card-block">
            @if(Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{Session::get('success')}}</strong>
                </div>
                @elseif(Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{Session::get('error')}}</strong>
                </div>
                @endif
            @if($data)
            <div class="">
                <div class="row">
                    <div class="col-6">
                        <div class="profile">
                            @if(file_exists($data->image))
                            <img src="{{asset('public/public/Backend')}}/Images/studentImage/{{$data->image}}" height="180px" width="180px" style="border-radius:100px;">
                            @else
                            <img src="{{asset('public')}}/images/avatar.png" height="180px" width="180px" style="border-radius:100px;">
                            @endif
                        </div>
                        <div class="student_info">
                            <div class="name">
                                <h2><b>{{$data->name}}</b></h2>
                                <b><i class="feather icon-phone"></i>  {{$data->phone}}</b><br>
                                <b><i class="feather icon-mail"></i>  {{$data->email}}</b><br>
                                <b><i class="feather icon-home"></i>  {{$data->adress}}, {{$data->upazila}}, {{$data->district}}.</b><br>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="course_info">
                            @php
                            $course = DB::table('student_course_info')
                                            ->join('course_infos','course_infos.id','student_course_info.course_id')
                                           ->where('student_id',$data->id)
                                           ->select('course_infos.course_name','course_infos.id','student_course_info.status')
                                           ->get(); 
                            @endphp
                            @if($course)
                            @foreach($course as $showcourse_info)
                            <li>{{$showcourse_info->course_name}} @if($showcourse_info->status == '1') <span style="font-size:10px;" class="badge badge-success">Completed</span>@endif</li>
                            @endforeach
                            @endif
                            <div class="course_fee">
                                <li>Course Fee : <div class="badge badge-info">{{$data->main_fee}}</div></li>
                                <li>Discount Fee : <div class="badge badge-warning">{{$data->discount}}</div></li>
                                <li>Discount Percantage (%) : <div class="badge badge-secondary">{{$data->discount_per}}</div></li>
                                <li>Total Course Fee : <div class="badge badge-success">{{$data->total_fee}}</div></li>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-12">
                                <div class="course_box">
                                    <div class="title" style="background: green;">
                                        <h5>Paid : {{$data->paid}}/-</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-12">
                                <div class="course_box">
                                    <div class="title" style="background: red;">
                                        <h5>Due : {{$data->due}}/-</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="others_info" style="margin-top: 20px;">
                    <div class="card-header">
                         <h5>Course And Trainers</h5>
                    </div>
                    <div class="row">
                    @if($course)
                    @foreach($course as $show_course_info)
                    <div class="col-lg-4 col-6">
                        <div class="course_box">
                            <div class="title">
                                <h5>{{$show_course_info->course_name}}</h5>
                            </div>
                            <div class="trainers">
                                <div class="trainer_single">
                                    @php 
                                    $trainer_info = DB::table('trainer_appoint')
                                                    ->join('trainer_info','trainer_info.id','trainer_appoint.trainer_id')
                                                    ->where('student_id',$data->id)
                                                    ->get();

                                   
                                    @endphp
                                    @if($trainer_info)
                                    @foreach($trainer_info as $show_trainer_info)
                                    @if($show_course_info->id == $show_trainer_info->course_id)
                                    <li>
                                        <img src="{{asset('public/Backend')}}/Images/trainerImage/{{$show_trainer_info->image}}" style="height:50px;width:50px;border-radius: 100px;"> <span>{{$show_trainer_info->trainer_name}}</span>   <i style="color:green" class="fa fa-check-circle"></i>
                                    </li>
                                    @endif
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="complete_btn" style="text-align:center;padding: 5px;">
                                @if($show_course_info->status == '1')
                                <a target="blank" href="{{url('getCertificate')}}/{{$data->id}}/{{$show_course_info->id}}" class="btn btn-outline-success">Get Certificate</a>
                                @else
                                <a href="{{url('complete_course')}}/{{$data->id}}/{{$show_course_info->id}}" class="btn btn-outline-info">Complete</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                <div class="card-header">
                     <h5>Transactions</h5>
                </div>
                @php
                $transaction = DB::table('student_collection')
                        ->join('student_info','student_info.id','=','student_collection.student_id')
                        ->where('student_id',$data->id)
                        ->select('student_info.name','student_collection.*')
                        ->get();
                $sl=1;
                @endphp
                <div class="dt-responsive table-responsive">
                    <table class="table table-striped table-bordered nowrap dataTable" id="order-table">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Date</th>
                                <th>Student Name</th>
                                <th>Collection Ammount</th>
                                <th>Comment</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($transaction)
                            @foreach($transaction as $showdata)
                            <tr>
                                <td>{{$sl++}}</td>
                                <td>{{$showdata->date}}</td>
                                <td>{{$showdata->name}}</td>
                                <td>
                                    <div class="badge badge-success">{{$showdata->collection_ammount}}</div>
                                </td>
                                <td>{{$showdata->comment}}</td>
                                <td>
                                    <a href="{{url('/deleteCollection')}}/{{$showdata->id}}/{{$showdata->student_id}}" class="btn btn-outline-danger">Delete</a>
                                    <a target="blank" href="{{url('/voucher')}}/{{$showdata->id}}/{{$showdata->student_id}}" class="btn btn-outline-info">Voucher</a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
            @endif
        </div>
    </div> 
 </div>
 <!-- //body content goes here -->

</div>
</div>
</div>
</div>
</div>




@endsection