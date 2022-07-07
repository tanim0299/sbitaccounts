@extends('Backend.Layouts.master')
@section('body')
<div class="pcoded-content">

<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<!-- <i class="feather icon-home bg-c-blue"></i> -->
<div class="d-inline">
<h5>Add Employee Salary</h5>
<!-- <span>This Is SBIT Dashboard</span> -->
<div class="links" style="margin-top: 20px;">
    <a href="{{url('/viewEmpSalary')}}" class="btn btn-outline-info">View Employee Salary</a>
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
        <div class="card-header" id="">
             <h5>Add Employee Salary</h5>
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
            <form method="POST" enctype="multipart/form-data" action="{{url('/salaryStore')}}">
                @csrf
                <div class="input-single-box">
                    <label>Date (YYYY/MM/DD)</label>
                    <input name="date" class="form-control" type="text" value="@php echo date('Y-m-d') @endphp" required id="dateTimePicker">
                </div>
                <div class="input-single-box">
                    <label>Select Employee</label>
                    <select class="form-control" name="trainer_id" id="trainerId" required>
                        <option value="0">Select One</option>
                        @if($trainer)
                        @foreach($trainer as $show_trainer)
                        <option value="{{$show_trainer->id}}">{{$show_trainer->trainer_name}} ({{$show_trainer->phone}})</option>
                        @endforeach
                        @endif
                    </select>
                </div> 
                <div class="input-single-box" id="SalaryMonthData">
                    <label>Month</label>
                    <select class="form-control" name="month" id="salaryMonth">
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select>
                </div>
                <div class="input-single-box">
                    <label>Year</label>
                    <input type="text" name="year" class="form-control" value="@php echo date('Y'); @endphp" id="salaryYear">
                </div>
                
                <div class="input-single-box">
                    <label>Salary</label>
                    <input type="text" name="total_salary" class="form-control" value="{{old('total_salary')}}" readonly id="totalSalary">
                </div>
                <div class="input-single-box">
                    <label>Given Ammount</label>
                    <input type="text" name="ammount" class="form-control" value="{{old('ammount')}}" id="ammount">
                </div>
                <div class="input-single-box">
                    <label>Comment</label>
                    <textarea class="form-control" name="comment"></textarea>
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