<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Statement</title>
	<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/bower_components/bootstrap/css/bootstrap.min.css">

</head>
<style type="text/css">
	body
	{
		font-family:monospace;
		-webkit-print-color-adjust: exact;
	}
	.image img {
    width: 100%;
    height: 150px;
}
	@import    url('https://fonts.googleapis.com/css2?family=Great+Vibes&family=Jura:wght@300;400;500;600;700&family=Kdam+Thmor+Pro&family=Oswald:wght@200;300;400;500;600;700&family=Poppins:ital,wght@0,600;0,700;0,800;0,900;1,600;1,700;1,800;1,900&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap');
	.dynamic_data{
		/*font-family: 'popins', sans-serif;*/
	}
	.signature img {
    height: 37px;
    /*border-bottom: 1px dashed black;*/
}
.signature span{
	border-top: 1px dashed black;
}
.invoice {
    /*width: 137mm;*/
    /*height: auto;*/
    font-size: 12px;
    font-weight: bold;
    /*background: lightgray;*/
    border: 1px solid black;
    margin: auto;
}
td {
    border: 1px solid black !important;
}
th {
    border: 1px solid black !important;
}
.total_td{
	/*background:black;color: white;*/
	-webkit-print-color-adjust: exact;
}
@media print{
	.print-btn{
		display: none;
	}
}
</style>
<body>

	<div class="container">
		 <div class="invoice">
		 	<div class="invoice-header">
		 		<div class="image">
		 			<img src="{{asset('public')}}/public/invoice_header.jpg" class="img-fluid">
		 		</div>
		 	</div>
		 	<div class="invoice-content">
		 		<div class="heading" style="text-align:center;">
		 			<b>Statment Type : {{$type}}</b><br>
		 			@if($type == 'Daily')
		 			<b>For The Date Of {{$date}}</b>
		 			@endif
		 			@if($type == 'Date_to_Date')
		 			<b>From {{$from_date}} To {{$to_date}}</b>
		 			@endif
		 			@if($type == 'Monthly')
		 			<b>For The Month of {{$monthName}} {{$year}}</b>
		 			@endif
		 			@if($type == 'Yearly')
		 			<b>For The Year of {{$year}}</b>
		 			@endif
		 		</div>
		 		<div class="row" style="margin-top:20px;">
		 			<div class="col-lg-6 col-md-6 col-6">
		 				<div class="left">
		 					<h5 style="text-transform: uppercase;color: green;">Income</h5>
		 					<table class="table table-hover" style="text-align:center">
		 						<thead>
		 							<tr>
		 								<th>Date</th>
		 								<th>Income Type</th>
		 								<th>Recived From</th>
		 								<th>Ammount</th>
		 							</tr>
		 						</thead>
		 						<tbody>
		 							@if($income)
		 							@foreach($income as $showincome)
		 							<tr>
		 								<td>{{$showincome->date}}</td>
		 								<td>{{$showincome->income_title}}</td>
		 								<td>{{$showincome->recived_from}}</td>
		 								<td>{{$showincome->ammount}}/-</td>
		 							</tr>
		 							@endforeach
		 							@endif
		 							<tr>
		 								<td colspan="3" style="text-align:right;">Total</td>
		 								<td>{{$total_income}}/-</td>
		 							</tr>
		 						</tbody>
		 					</table>
		 				</div>
		 			</div>
		 			<div class="col-lg-6 col-md-6 col-6">
		 				<div class="left">
		 					<h5 style="text-transform: uppercase;color: red;">Expense</h5>
		 					<table class="table table-hover" style="text-align:center">
		 						<thead>
		 							<tr>
		 								<th>Date</th>
		 								<th>Expense Type</th>
		 								<th>Details</th>
		 								<th>Ammount</th>
		 							</tr>
		 						</thead>
		 						<tbody>
		 							@if($expense)
		 							@foreach($expense as $showdata)
		 							<tr>
		 								<td>{{$showdata->date}}</td>
		 								@php
			                            if($showdata->expense_title == 'Salary Expense')
			                            {
			                                $details = DB::table('salary_info')
			                                           ->join('trainer_info','salary_info.trainer_id','=','trainer_info.id')
			                                           ->where('salary_info.expense_id',$showdata->id)
			                                           ->select('salary_info.month','salary_info.year','trainer_info.trainer_name')
			                                           ->first();
			                            }
			                            @endphp
			                            @if($details)
			                            <td>{{$showdata->expense_title}} ( {{$details->trainer_name}} - {{$details->month}} - {{$details->year}} )</td>
			                            @else
			                            <td>{{$showdata->expense_title}}</td>
			                            @endif
		 								<td>{{$showdata->details}}</td>
		 								<td>{{$showdata->ammount}}/-</td>
		 							</tr>
		 							@endforeach
		 							@endif
		 							<tr>
		 								<td colspan="3" style="text-align:right;">Total</td>
		 								<td>{{$total_expense}}/-</td>
		 							</tr>
		 						</tbody>
		 					</table>
		 				</div>
		 			</div>
		 			<div class="col-lg-6 col-md-6 col-12">
		 				<div class="status">
		 					<span> Status : Your Company Is In {{$result}}</span>
		 				</div>
		 			</div>
		 		</div>
		 		<div class="text" style="text-align:center;">
		 			<i>Develop By SBIT</i>
		 		</div>
		 	</div>
		 	
		 </div>
		 <div class="print-btn" style="text-align:center;margin-top: 20px;">
		 		<button class="bt btn-danger" id="print">Print</button>
		 	</div>
	</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script type="text/javascript" src="{{asset('public/Backend')}}/bower_components/jquery/js/jquery.min.js"></script>

<script type="text/javascript">
	
	$(document).ready(function(){
		$("#print").on('click',function(){
			window.print();
		});
	});

</script>

</body>
</html>