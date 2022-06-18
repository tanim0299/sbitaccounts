@extends('Backend.Layouts.master')
@section('body')
<div class="pcoded-content">

<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<!-- <i class="feather icon-home bg-c-blue"></i> -->
<div class="d-inline">
<h5>View Student</h5>
<!-- <span>This Is SBIT Dashboard</span> -->
<div class="links" style="margin-top: 20px;">
    <a href="{{url('addStudent')}}" class="btn btn-outline-info">Add Student</a>
</div>
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
        <div class="card-header">
             <h5>View Student</h5>
        </div>
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

            <div class="dt-responsive table-responsive">
                <table class="table table-striped table-bordered nowrap dataTable" id="order-table">
                    <thead>
                        <tr>
                            <!-- <th>Select</th> -->
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Fathers Name</th>
                            <th>Mothers Name</th>
                            <th>Gender</th>
                            <th>Nationality</th>
                            <th>Religion</th>
                            <th>Institute Name</th>
                            <th>Technology/Group</th>
                            <th>Semister/Year</th>
                            <th>Student Type</th>
                            <th>Course</th>
                            <th>Course Fee</th>
                            <th>Discount Fee</th>
                            <th>Discount Percantage(%)</th>
                            <th>Total Ammount</th>
                            <th>Paid</th>
                            <th>Due</th>
                            <th>Join Date</th>
                            <th>Class Time</th>
                            <th>image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($data)
                        @foreach($data as $showdata)
                        <tr>
                            <!-- <td><input type="checkbox" name="id[]" value="{{$showdata->id}}"></td> -->
                            <td>{{$sl++}}</td>
                            <td>{{$showdata->name}}</td>
                            <td>{{$showdata->fathers_name}}</td>
                            <td>{{$showdata->mothers_name}}</td>
                            <td>{{$showdata->gender}}</td>
                            <td>{{$showdata->nationality}}</td>
                            <td>{{$showdata->religion}}</td>
                            <td>{{$showdata->institute}}</td>
                            <td>{{$showdata->group}}</td>
                            <td>{{$showdata->semister}}</td>
                            <td>{{$showdata->type}}</td>
                            <td>
                                @php
                                $course = DB::table('student_course_info')
                                          ->where('student_id',$showdata->id)
                                          ->join('course_infos','course_infos.id','=','student_course_info.course_id')
                                          ->select('course_infos.course_name')
                                          ->get();  
                                @endphp
                                @if($course)
                                @foreach($course as $showcourse)
                                <li>{{$showcourse->course_name}}</li>
                                @endforeach
                                @endif
                            </td>
                            <td>{{$showdata->main_fee}}</td>
                            <td>{{$showdata->discount}}</td>
                            <td>{{$showdata->discount_per}}</td>
                            <td>{{$showdata->total_fee}}</td>
                            <td></td>
                            <td></td>
                            <td>{{$showdata->join_date}}</td>
                            <td>{{$showdata->class_time}}</td>
                            <td><img src="{{asset('public/public/Backend')}}/Images/studentImage/{{$showdata->image}}" height="70px" width="70px" style="border-radius:100px;"></td>
                            <td>
                                <a target="blank" href="{{url('showForm')}}/{{$showdata->id}}" class="btn btn-outline-secondary">Show Form</a>
                                <a href="{{url('editStudent')}}/{{$showdata->id}}" class="btn btn-outline-info">Edit</a>
                                <a href="{{url('deleteStudent')}}/{{$showdata->id}}" class="btn btn-outline-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
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