
@extends('Backend.Layouts.master')
@section('body')
<div class="pcoded-content">

<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<!-- <i class="feather icon-home bg-c-blue"></i> -->
<div class="d-inline">
<h5>View Invoice</h5>
<!-- <span>This Is SBIT Dashboard</span> -->
<div class="links" style="margin-top: 20px;">
    <a href="{{url('makeBill')}}" class="btn btn-outline-info">Add Invoice</a>
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
             <h5>View Invoice</h5>
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

            <div class="dt-responsive table-responsive">
                <table class="table table-striped table-bordered nowrap dataTable" id="order-table">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Date</th>
                            <th>Invoice ID</th>
                            <th>Title</th>
                            <th>Client Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($data)
                        @foreach($data as $showdata)
                        <tr>
                            <td>{{$sl++}}</td>
                            <td>{{$showdata->date}}</td>
                            <td>{{$showdata->invoice_id}}</td>
                            <td>{{$showdata->title}}</td>
                            <td>{{$showdata->client_name}}</td>
                            <td>
                                <a target="_blank" href="{{url('/getInvoice')}}/{{$showdata->id}}/{{$showdata->invoice_id}}" class="btn btn-outline-info">Get Invoice</a>
                                <a href="{{url('/delete_invoice')}}/{{$showdata->id}}/{{$showdata->invoice_id}}" class="btn btn-outline-danger">Delete</a>
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