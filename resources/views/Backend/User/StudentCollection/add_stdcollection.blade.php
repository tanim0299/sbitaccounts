@extends('Backend.Layouts.master')
@section('body')
<div class="pcoded-content">

<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<!-- <i class="feather icon-home bg-c-blue"></i> -->
<div class="d-inline">
<h5>Add Student Collection</h5>
<!-- <span>This Is SBIT Dashboard</span> -->
<div class="links" style="margin-top: 20px;">
    <a href="{{url('/viewStdcollection')}}" class="btn btn-outline-info">View Student Collection</a>
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
             <h5>Add Student Collection</h5>
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
            <form method="POST" enctype="multipart/form-data" action="{{url('/collectionStore')}}">
                @csrf
                <div class="input-single-box">
                    <label>Date (YYYY/MM/DD)</label>
                    <input name="date" class="form-control" type="text" value="@php echo date('Y-m-d') @endphp" required id="dateTimePicker">
                </div>
                <div class="input-single-box">
                    <label>Select Student</label>
                    <select class="form-control" name="student_id" id="studentId" required>
                        <option value="0">Select One</option>
                        @if($student)
                        @foreach($student as $showstudent)
                        <option value="{{$showstudent->id}}">{{$showstudent->name}} ({{$showstudent->phone}})</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="input-single-box">
                    <label>Total Due Ammount</label>
                    <input type="text" name="total_due" class="form-control" value="{{old('total_due')}}" readonly id="totaldue">
                </div>
                <div class="input-single-box">
                    <label>Collection Ammount</label>
                    <input type="text" name="collection_ammount" class="form-control" value="{{old('collection_ammount')}}" id="collection_ammount">
                </div>
                <div class="input-single-box">
                    <label>Due Ammount</label>
                    <input type="text" name="due_ammount" class="form-control" value="{{old('total_fee')}}" readonly id="new_due">
                </div>
                <div class="input-single-box">
                    <label>Comment</label>
                    <textarea class="form-control" name="comment"></textarea>
                </div>
                <input type="text" name="admin_id" class="form-control" value="{{Auth()->user()->id}}" hidden>
                <div class="input-single-box">
                    <input type="submit" name="submit" class="btn btn-success" formtarget="_blank">
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