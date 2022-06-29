@extends('Backend.Layouts.master')
@section('body')
<div class="pcoded-content">

<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<!-- <i class="feather icon-home bg-c-blue"></i> -->
<div class="d-inline">
<h5>Add Student</h5>
<!-- <span>This Is SBIT Dashboard</span> -->
<div class="links" style="margin-top: 20px;">
    <a href="{{url('viewStudent')}}" class="btn btn-outline-info">View Student</a>
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
             <h5>Add Student</h5>
        </div>
        <div class="card-block">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
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
            <form method="POST" enctype="multipart/form-data" action="{{url('/studentStore')}}">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Date (YYYY/MM/DD)</label>
                            <input name="date" class="form-control" type="text" value="@php echo date('Y-m-d') @endphp" required id="dateTimePicker">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Student Type</label><br>
                            <select class="form-control" name="type" required>
                                <option value="Regular">Regular</option>
                                <option value="Industrial">Industrial</option>
                            </select>
                        </div>
                    </div>

                    <div class="card-header col-12">
                         <h5>Student Personal Information</h5>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Student Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Fathers Name</label>
                            <input type="text" name="fathers_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Mothers Name</label>
                            <input type="text" name="mothers_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Gender</label><br>
                            <select class="form-control" name="gender">
                                <!-- <option value="0">Select One</option> -->
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Nationality</label>
                            <input type="text" name="nationality" class="form-control" value="Bangladeshi">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Religion</label>
                            <select class="form-control" name="religion">
                                <option value="Islam">Islam</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddist">Buddist</option>
                                <option value="Chiristian">Chiristian</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Insititute Name</label>
                            <input type="text" name="institute" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Technology/Group</label>
                            <input type="text" name="group" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Semister/Year</label>
                            <input type="text" name="semister" class="form-control">
                        </div>
                    </div>
                    <div class="card-header col-12">
                         <h5>Student Contact Information</h5>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>District</label>
                            <input type="text" name="district" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Upazila</label>
                            <input type="text" name="upazila" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="input-single-box">
                            <label>Adress</label>
                            <textarea class="form-control" name="adress">
                                
                            </textarea>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>
                    <div class="card-header col-12">
                         <h5>Student Course Information</h5>
                    </div>
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="input-single-box">
                            <label><h3>Select Course</h3></label><br>
                            @if($course)
                            @foreach($course as $showcourse)
                            <div class="checkbox-fade fade-in-primary">
                                <label>
                                <input onclick="courseFee({{$showcourse->id}})" id="course_id-{{$showcourse->id}}" type="checkbox" value="{{$showcourse->id}}" name="course_id[]">
                                <span class="cr">
                                <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                </span>
                                <span>{{$showcourse->course_name}}</span>
                                </label>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12" id="fee">
                        <div class="input-single-box">
                            <label>Course Fee</label>
                            <input type="text" name="main_fee" class="form-control" readonly id="main_fee">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Discount</label>
                            <input type="text" name="discount" class="form-control" onkeyup="discount()" id="discount_ammount">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Discount Percentage</label>
                            <input type="text" name="discount_per" class="form-control" readonly id="discount_per">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Total Ammount</label>
                            <input type="text" name="total_fee" class="form-control" readonly id="total_fee">
                        </div>
                    </div>

                    <div class="card-header col-12">
                         <h5>Student Class Time</h5>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Join Date (YYYY/MM/DD)</label>
                            <input name="join_date" class="form-control" type="text" value="@php echo date('Y-m-d') @endphp" required id="dateTimePicker1">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Class Time</label>
                            <select class="form-control" name="class_time">
                                <option value="Morning">Morning</option>
                                <option value="Afternoon">Afternoon</option>
                            </select>
                        </div>
                    </div>
                </div>
                <input type="text" name="admin_id" class="form-control" value="{{Auth()->user()->id}}" hidden>
                <div class="input-single-box" style="text-align: center;">
                    <input type="submit" name="submit" class="btn btn-success btn-block">
                </div>
            </form>
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