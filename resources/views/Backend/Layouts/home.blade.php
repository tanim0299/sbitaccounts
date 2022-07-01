@extends('Backend.Layouts.master')
@section('body')
<div class="pcoded-content">

<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<i class="feather icon-home bg-c-blue"></i>
<div class="d-inline">
<h5>Dashboard</h5>
<span>This Is SBIT Dashboard</span>

<!-- <button onclick="javascript:toggleFullScreen()" class="btn btn-success">FFF</button> -->
<!-- <input id="dateTimePicker" /> -->
</div>
</div>
</div>

</div>
</div>

<div class="pcoded-inner-content">
<div class="main-body">
<div class="page-wrapper">
<div class="page-body">

<div class="row">

@php 

$admin = DB::table('users')->get();

$total_admin = count($admin);

@endphp
<div class="col-xl-3 col-md-6">
<div class="card prod-p-card card-blue">
<div class="card-body">
<div class="row align-items-center m-b-30">
<div class="col">
<h6 class="m-b-5 text-white">Total Admin</h6>
<h3 class="m-b-0 f-w-700 text-white">{{$total_admin}}</h3>
</div>
<div class="col-auto">
<i class="fas fa-user text-c-red f-18"></i>
</div>
</div>
</div>
</div>
</div>

@php 
$total_income = DB::table('income_info')
                ->sum('ammount');
@endphp
<div class="col-xl-3 col-md-6">
<div class="card prod-p-card card-green">
<div class="card-body">
<div class="row align-items-center m-b-30">
<div class="col">
<h6 class="m-b-5 text-white">Total Income</h6>
<h3 class="m-b-0 f-w-700 text-white">{{$total_income}} Tk</h3>
</div>
<div class="col-auto">
<i class="fas fa-money-bill-alt text-c-red f-18"></i>
</div>
</div>
</div>
</div>
</div>

@php 
$total_expnese = DB::table('expense_infos')
                ->sum('ammount');
@endphp
<div class="col-xl-3 col-md-6">
<div class="card prod-p-card card-red">
<div class="card-body">
<div class="row align-items-center m-b-30">
<div class="col">
<h6 class="m-b-5 text-white">Total Expense</h6>
<h3 class="m-b-0 f-w-700 text-white">{{$total_expnese}} Tk</h3>
</div>
<div class="col-auto">
<i class="fas fa-money-bill-alt text-c-red f-18"></i>
</div>
</div>
</div>
</div>
</div>
<!-- total_profit -->
@php 
$profit = $total_income-$total_expnese;
@endphp
<div class="col-xl-3 col-md-6">
<div class="card prod-p-card card-blue">
<div class="card-body">
<div class="row align-items-center m-b-30">
<div class="col">
<h6 class="m-b-5 text-white">Total Profit</h6>
<h3 class="m-b-0 f-w-700 text-white">{{$profit}} Tk</h3>
</div>
<div class="col-auto">
<i class="fas fa-money-bill-alt text-c-red f-18"></i>
</div>
</div>
</div>
</div>
</div>

@php 

$current_month = date('m');

$month_name = date('M');

$thisMonthIncome = DB::table('income_info')
                   ->whereMonth('date',$current_month)
                   ->sum('ammount');

@endphp
<div class="col-xl-3 col-md-6">
<div class="card prod-p-card card-green">
<div class="card-body">
<div class="row align-items-center m-b-30">
<div class="col">
<h6 class="m-b-5 text-white">This Month Income</h6>
<h3 class="m-b-0 f-w-700 text-white">{{$thisMonthIncome}} Tk</h3>
</div>
<div class="col-auto">
<i class="fas fa-money-bill-alt text-c-red f-18"></i>
</div>
</div>
</div>
</div>
</div>

@php 

$current_month = date('m');

$month_name = date('M');

$thisMonthExpense = DB::table('expense_infos')
                   ->whereMonth('date',$current_month)
                   ->sum('ammount');

@endphp
<div class="col-xl-3 col-md-6">
<div class="card prod-p-card card-red">
<div class="card-body">
<div class="row align-items-center m-b-30">
<div class="col">
<h6 class="m-b-5 text-white">This Month Expense</h6>
<h3 class="m-b-0 f-w-700 text-white">{{$thisMonthExpense}} Tk</h3>
</div>
<div class="col-auto">
<i class="fas fa-money-bill-alt text-c-red f-18"></i>
</div>
</div>
</div>
</div>
</div>

@php 

$current_date = date('Y-m-d');

$month_name = date('M');

$today_income = DB::table('income_info')
                   ->where('date',$current_date)
                   ->sum('ammount');

@endphp
<div class="col-xl-3 col-md-6">
<div class="card prod-p-card card-green">
<div class="card-body">
<div class="row align-items-center m-b-30">
<div class="col">
<h6 class="m-b-5 text-white">Today Income</h6>
<h3 class="m-b-0 f-w-700 text-white">{{$today_income}} Tk</h3>
</div>
<div class="col-auto">
<i class="fas fa-money-bill-alt text-c-red f-18"></i>
</div>
</div>
</div>
</div>
</div>

@php 

$current_date = date('Y-m-d');

$month_name = date('M');

$today_expense = DB::table('expense_infos')
                   ->where('date',$current_date)
                   ->sum('ammount');

@endphp
<div class="col-xl-3 col-md-6">
<div class="card prod-p-card card-red">
<div class="card-body">
<div class="row align-items-center m-b-30">
<div class="col">
<h6 class="m-b-5 text-white">Today Expense</h6>
<h3 class="m-b-0 f-w-700 text-white">{{$today_expense}} Tk</h3>
</div>
<div class="col-auto">
<i class="fas fa-money-bill-alt text-c-red f-18"></i>
</div>
</div>
</div>
</div>
</div>


@php 

$trainer = DB::table('trainer_info')->get();

$total_trainer = count($trainer);

@endphp
<div class="col-xl-3 col-md-6">
<div class="card prod-p-card card-yellow">
<div class="card-body">
<div class="row align-items-center m-b-30">
<div class="col">
<h6 class="m-b-5 text-white">Total Trainer</h6>
<h3 class="m-b-0 f-w-700 text-white">{{$total_trainer}}</h3>
</div>
<div class="col-auto">
<i class="fas fa-user text-c-red f-18"></i>
</div>
</div>
</div>
</div>
</div>

@php 

$student = DB::table('student_info')->get();

$total_student = count($student);

@endphp
<div class="col-xl-3 col-md-6">
<div class="card prod-p-card card-blue">
<div class="card-body">
<div class="row align-items-center m-b-30">
<div class="col">
<h6 class="m-b-5 text-white">Total Student</h6>
<h3 class="m-b-0 f-w-700 text-white">{{$total_student}}</h3>
</div>
<div class="col-auto">
<i class="fas fa-user text-c-red f-18"></i>
</div>
</div>
</div>
</div>
</div>

@php 

$course = DB::table('course_infos')->get();

$total_course = count($course);

@endphp
<div class="col-xl-3 col-md-6">
<div class="card prod-p-card card-green">
<div class="card-body">
<div class="row align-items-center m-b-30">
<div class="col">
<h6 class="m-b-5 text-white">Total Course</h6>
<h3 class="m-b-0 f-w-700 text-white">{{$total_course}}</h3>
</div>
<div class="col-auto">
<i class="fas fa-database text-c-red f-18"></i>
</div>
</div>
</div>
</div>
</div>















</div>

</div>
</div>
</div>
</div>
</div>




@endsection