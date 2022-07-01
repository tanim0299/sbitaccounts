@extends('Backend.Layouts.master')
@section('body')
<div class="pcoded-content">

<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<!-- <i class="feather icon-home bg-c-blue"></i> -->
<div class="d-inline">
<h5>Add Income Title</h5>
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
             <h5>Add Income Title</h5>
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
            <form method="POST" enctype="multipart/form-data" action="{{url('/incomeTitleStore')}}">
                @csrf
                <div class="input-single-box">
                    <label>Serial No</label>
                    <input type="text" name="sl" class="form-control" value="{{old('sl')}}">
                </div>
                <div class="input-single-box">
                    <label>Title Name</label>
                    <input type="text" name="income_title" class="form-control" value="{{old('income_title')}}">
                </div>
                <div class="input-single-box">
                    <label>Status</label>
                    <select class="form-control" name="status"> 
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <input type="text" name="admin_id" class="form-control" value="{{Auth()->user()->id}}" hidden>
                <div class="input-single-box">
                    <input type="submit" name="submit" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
 </div>
 <div class="form-body">
    <div class="card">
        <div class="card-header">
             <h5>View Income Title</h5>
        </div>
        <div class="card-block">
            <div class="dt-responsive table-responsive">
                <table class="table table-striped table-bordered nowrap dataTable" id="order-table">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Title Namex</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($data)
                        @foreach($data as $showdata)
                        <tr>
                            <td>{{$showdata->sl}}</td>
                            <td>{{$showdata->income_title}}</td>
                            <td>
                                @if($showdata->status == '1')
                                <div class="badge badge-success">Active</div>
                                @else
                                <div class="badge badge-danger">Inactive</div>
                                @endif
                            </td>
                            <td>
                                <a href="{{url('editIncomeTitle')}}/{{$showdata->id}}" class="btn btn-outline-info">Edit</a>
                                @if($showdata->id == 1000)
                                
                                @else
                                <a href="{{url('deleteIncomeTitle')}}/{{$showdata->id}}" class="btn btn-outline-danger">Delete</a>
                                @endif
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