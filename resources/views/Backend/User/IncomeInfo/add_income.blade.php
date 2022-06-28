@extends('Backend.Layouts.master')
@section('body')
<div class="pcoded-content">

<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<!-- <i class="feather icon-home bg-c-blue"></i> -->
<div class="d-inline">
<h5>Add Income</h5>
<!-- <span>This Is SBIT Dashboard</span> -->
<div class="links" style="margin-top: 20px;">
    <a href="{{url('viewIncome')}}" class="btn btn-outline-info">View Income</a>
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
             <h5>Add Income</h5>
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
            <form method="POST" enctype="multipart/form-data" action="{{url('/incomeStore')}}">
                @csrf
                <div class="input-single-box">
                    <label>Date</label>
                    <input type="text" name="date" id="dropper-animation" class="form-control" value="{{old('sl')}}">
                </div>
                <div class="input-single-box">
                    <label>Income Type</label>
                    <select class="form-control" name="income_title_id">
                        @if($income_title)
                        @foreach($income_title as $show_title)
                        <option value="{{$show_title->id}}">{{$show_title->income_title}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="input-single-box">
                    <label>Recived From</label>
                    <input type="text" name="recived_from" class="form-control" value="{{old('link_name')}}">
                </div>
                <div class="input-single-box">
                    <label>Ammount</label>
                    <input type="text" name="ammount" class="form-control">
                </div>

                <div class="input-single-box">
                    <label>Details</label>
                    <textarea class="form-control" name="details" style="height:100px;"></textarea>
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