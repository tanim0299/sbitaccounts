@extends('Backend.Layouts.master')
@section('body')
<div class="pcoded-content">

<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<!-- <i class="feather icon-home bg-c-blue"></i> -->
<div class="d-inline">
<h5>Add Trainer</h5>
<!-- <span>This Is SBIT Dashboard</span> -->
<div class="links" style="margin-top: 20px;">
    <a href="{{url('viewTrainer')}}" class="btn btn-outline-info">View Trainer</a>
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
             <h5>Add Trainer</h5>
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
            <form method="POST" enctype="multipart/form-data" action="{{url('/trainerStore')}}">
                @csrf
                <!-- <div class="input-single-box">
                    <label>Serial No</label>
                    <input type="text" name="sl" class="form-control" value="{{old('sl')}}">
                </div> -->
                <div class="input-single-box">
                    <label>Select Course</label>
                    <select class="form-control" name="course_id">
                        @if($course)
                        @foreach($course as $showcourse)
                        <option value="{{$showcourse->id}}">{{$showcourse->course_name}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="input-single-box">
                    <label>Trainer Name</label>
                    <input type="text" name="trainer_name" class="form-control" value="{{old('trainer_name')}}">
                </div>
                <div class="input-single-box">
                    <label>Trainer Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
                </div>
                <div class="input-single-box">
                    <label>Trainer Designation</label>
                    <input type="text" name="designation" class="form-control" value="{{old('designation')}}">
                </div>
                <div class="input-single-box">
                    <label>Trainer Salary</label>
                    <input type="number" name="salary" class="form-control" value="{{old('salary')}}">
                </div>
                <div class="input-single-box">
                    <label>Adress</label>
                    <textarea class="form-control" name="adress"></textarea>
                </div>
                <div class="input-single-box">
                    <label>Status</label>
                    <select class="form-control" name="status"> 
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <div class="input-single-box">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <input type="text" name="admin_id" class="form-control" value="{{Auth()->user()->id}}" hidden>
                <div class="input-single-box">
                    <input type="submit" name="submit" class="btn btn-success">
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