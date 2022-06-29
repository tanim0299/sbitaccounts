@extends('Backend.Layouts.master')
@section('body')
<div class="pcoded-content">

<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<!-- <i class="feather icon-home bg-c-blue"></i> -->
<div class="d-inline">
<h5>Expense Report</h5>
<!-- <span>This Is SBIT Dashboard</span> -->
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
             <h5>Expense Report</h5>
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
            <form method="POST" enctype="multipart/form-data" action="{{url('/showExpenseReport')}}">
                @csrf
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="input-single-box">
                             <label>Report Type</label>
                             <select class="form-control" name="report_type" id="report_type">
                                 <option value="All">All</option>
                                 <option value="Daily">Daily</option>
                                 <option value="Date_to_Date">Date To Date</option>
                                 <option value="Monthly">Monthly</option>
                                 <option value="Yearly">Yearly</option>
                             </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12" id="daily" style="display: none;">
                         <div class="input-single-box">
                             <label>Date (YYYY/MM/DD)</label>
                             <input type="text" name="date" id="dateTimePicker" class="form-control" value="@php echo date('Y-m-d') @endphp">
                         </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12" id="date_to_date" style="display: none;">
                        <div class="input-single-box">
                            <label>From (YYYY/MM/DD)</label>
                            <input type="text" name="from_date" id="dateTimePicker1" class="form-control" value="@php echo date('Y-m-d') @endphp">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12" id="date_to_date1" style="display: none;">
                        <div class="input-single-box">
                            <label>To (YYYY/MM/DD)</label>
                            <input type="text" name="to_date" id="dateTimePicker2" class="form-control" value="@php echo date('Y-m-d') @endphp">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12" id="monthly" style="display: none;">
                        <div class="input-single-box">
                            <label>Month</label>
                            <select class="form-control" name="month">
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12" id="monthly1" style="display: none;">
                        <div class="input-single-box">
                            <label>Year</label>
                            <input type="text" name="year" class="form-control" value="@php echo date('Y'); @endphp">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12" id="yearly" style="display: none;">
                        <div class="input-single-box">
                            <label>Year</label>
                            <input type="text" name="yearly_year" class="form-control" value="@php echo date('Y'); @endphp">
                        </div>
                    </div>
                    </div>
                    <div class="input-single-box">
                        <input type="submit" name="submit" class="btn btn-success" formtarget="_blank">
                    </div>
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