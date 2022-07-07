@extends('Backend.Layouts.master')
@section('body')
<div class="pcoded-content">

<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<!-- <i class="feather icon-home bg-c-blue"></i> -->
<div class="d-inline">
<h5>Create Invoice</h5>
<!-- <span>This Is SBIT Dashboard</span> -->
<div class="links" style="margin-top: 20px;">
    <a href="{{url('viewInvoice')}}" class="btn btn-outline-info">View Invoice</a>
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
             <h5>Create Invoice</h5>
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
            <form method="POST" enctype="multipart/form-data" action="{{url('/invoice_store')}}">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Date</label>
                            <input type="text" name="date" class="form-control" id="dateTimePicker" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Invoice ID</label>
                            <input type="text" name="invoice_id" class="form-control" value="@php echo rand(); @endphp" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Client Name</label>
                            <input type="text" name="client_name" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Client Url</label>
                            <input type="text" name="url" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="input-single-box">
                            <label>Description</label>
                            <textarea class="form-control" name="description" id="description"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-single-box">
                            <label>Ammount</label>
                            <input type="number" name="ammount" class="form-control" id="ammount">
                        </div>
                    </div>

                <input hidden type="text" name="session_id" class="form-control" id="session_id" value="{{$session_id}}">
                </div>
                <div class="input-single-box">
                    <input type="button" name="submit" class="btn btn-success" id="add_current" value="+ Add">
                </div>
            
        </div>
    </div> 
    <div class="card">
        <div class="card-header">
             <h5>Current Data</h5>
        </div>
        <div class="card-block">
            <div class="dt-responsive table-responsive" id="">
                <table class="table table-striped table-bordered nowrap dataTable" id="order-table">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Description</th>
                            <th>Ammount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="current_data">
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="submit" style="padding-bottom: 20px;text-align: right;padding-right: 20px;">
            <input type="submit" name="submit" class="btn btn-outline-info">
        </div>
        </form>
    </div> 
 </div>
 <!-- //body content goes here -->

</div>
</div>
</div>
</div>
</div>




@endsection