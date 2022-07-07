<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Income Report</title>
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
		font-family: 'Jura', sans-serif;
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
    font-size: 15px;
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
		 		<table class="table table-hover table-bordered" style="">
		 			<thead>
		 				<tr>
		 					<td colspan="6" style="text-align:center;">
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
		 					</td>
		 				</tr>
		 				<tr>
		 					<th>Sl</th>
		 					<th>Date</th>
		 					<th>Income Type</th>
		 					<th>Recived From</th>
		 					<th>Ammount</th>
		 				</tr>
		 				@if($data)
		 				@foreach($data as $showdata)
		 				<tr>
		 					<td>{{$sl++}}</td>
		 					<td>{{$showdata->date}}</td>
		 					<td>{{$showdata->income_title}}</td>
		 					<td>{{$showdata->recived_from}} ({{$showdata->details}})</td>
		 					<td>{{$showdata->ammount}}/-</td>
		 				</tr>
		 				@endforeach
		 				@endif
		 				<tr>
		 					<td colspan="4" style="text-align:right;">
		 						Total
		 					</td>
		 					<td class="total_td" colspan="1">
		 						<div class="total">
		 							<b class="total">{{$total}}/-</b>
		 						</div>
		 						
		 					</td>
		 				</tr>
		 			</thead>
		 		</table>
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