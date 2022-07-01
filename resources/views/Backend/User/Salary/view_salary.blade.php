
@extends('Backend.Layouts.master')
@section('body')
<div class="pcoded-content">

<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<!-- <i class="feather icon-home bg-c-blue"></i> -->
<div class="d-inline">
<h5>View Salary</h5>
<!-- <span>This Is SBIT Dashboard</span> -->
<div class="links" style="margin-top: 20px;">
    <a href="{{url('giveSalary')}}" class="btn btn-outline-info">Add Salary</a>
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
             <h5>View Salary</h5>
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
                <div class="row">
                        <div class="col-12">
                            <div class="input-single-box">
                            <label>Select Year</label>
                            <select class="form-control" name="year" id="selectYear">
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                            </select>
                        </div>
                        </div>
                    </div>
                    <div id='SalaryData' class="row">
                    @if($trainer)
                    @foreach($trainer as $showtrainer)
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="trainer_single-box" style="margin-top: 20px;">
                            <div class="box-header bg-success">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="trainer_image">
                                            <img src="{{asset('public')}}/Backend/Images/trainerImage/{{$showtrainer->image}}">
                                        </div>
                                        <div class="trainer_name">
                                             <h3>{{$showtrainer->trainer_name}}</h3>
                                        </div>
                                        <div class="trainer_name">
                                             <span>{{$showtrainer->designation}}</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="trainer-salary" style="text-align:right;">
                                            <label>Salary Info For This Year</label>
                                            <span>Salary Ammount : {{$showtrainer->salary}}/-</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <table class="table table-striped table-bordered" style="margin-bottom: 0px;">
                                    <tr>
                                        <th>Sl</th>
                                        <th>Month</th>
                                        <th>Year</th>
                                        <th>Given Ammount</th>
                                        <th>Action</th>
                                    </tr>
                                    @if($salary_info)
                                    @foreach($salary_info as $showSalary_info)
                                    @if($showSalary_info->trainer_id == $showtrainer->id)
                                    @if($showSalary_info->year == $year)
                                    <tr>
                                        <td>{{$sl++}}</td>
                                        <td>{{$showSalary_info->month}}</td>
                                        <td>{{$showSalary_info->year}}</td>
                                        <td>{{$showSalary_info->ammount}}/-</td>
                                        <td>
                                            <a href="{{url('deleteSalary')}}/{{$showSalary_info->id}}" class="btn btn-outline-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @endif
                                    @endif
                                    @endforeach
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    </div>
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