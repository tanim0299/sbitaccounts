@extends('Backend.Layouts.master')
@section('body')
<div class="pcoded-content">

<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<!-- <i class="feather icon-home bg-c-blue"></i> -->
<div class="d-inline">
<h5>Trainer Appoint</h5>
<!-- <span>This Is SBIT Dashboard</span> -->
<div class="links" style="margin-top: 20px;">
    <!-- <a href="{{url('viewStudent')}}" class="btn btn-outline-info">View Student</a> -->
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
             <h5>Trainer Appoint</h5>
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
            <form method="POST" enctype="multipart/form-data" action="{{url('/trainerAppoint')}}">
                @csrf
                <div class="input-single-box">
                    <label>Select Student</label>
                    <select class=" form-control" name="student_id" id="student_id">
                        <option>Select One</option>
                        @if($student)
                        @foreach($student as $showstudent)
                        @php
                        $check = DB::table('trainer_appoint')
                                 ->where('student_id',$showstudent->id)
                                 ->get();
                        @endphp
                        @if(count($check) == 0)
                        <option value="{{$showstudent->id}}">{{$showstudent->name}} ({{$showstudent->phone}})</option>
                        @endif
                        @endforeach
                        @endif
                    </select>
                </div>
                <div id="course_detail">
                    
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
