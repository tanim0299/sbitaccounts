@extends('Backend.Layouts.master')
@section('body')
<div class="pcoded-content">

<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<!-- <i class="feather icon-home bg-c-blue"></i> -->
<div class="d-inline">
<h5>Edit Trainer</h5>
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
             <h5>Edit Trainer</h5>
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
                @if($data)
            <form method="POST" enctype="multipart/form-data" action="{{url('/trainerUpdate')}}/{{$data->id}}">
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
                        <option @if($showcourse->id == $data->course_id) selected @endif value="{{$showcourse->id}}">{{$showcourse->course_name}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="input-single-box">
                    <label>Trainer Name</label>
                    <input type="text" name="trainer_name" class="form-control" value="{{$data->trainer_name}}">
                </div>
                <div class="input-single-box">
                    <label>Trainer Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{$data->phone}}">
                </div>
                <div class="input-single-box">
                    <label>Trainer Designation</label>
                    <input type="text" name="designation" class="form-control" value="{{$data->designation}}">
                </div>
                <div class="input-single-box">
                    <label>Trainer Salary</label>
                    <input type="number" name="salary" class="form-control" value="{{$data->salary}}">
                </div>
                <div class="input-single-box">
                    <label>Adress</label>
                    <textarea class="form-control" name="adress">{{$data->adress}}</textarea>
                </div>
                <div class="input-single-box">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        @if($data->status == '1')
                        <option selected value="1">Active</option>
                        <option value="0">Inactive</option>
                        @else
                        <option value="1">Active</option>
                        <option selected value="0">Inactive</option>
                        @endif
                    </select>
                </div>
                <div class="input-single-box">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                    <img src="{{asset('public/Backend')}}/Images/trainerImage/{{$data->image}}" height="70px" width="70px" style="border-radius:100px;">
                </div>
                <input type="text" name="admin_id" class="form-control" value="{{Auth()->user()->id}}" hidden>
                <div class="input-single-box">
                    <input type="submit" name="submit" class="btn btn-success">
                </div>
            </form>
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