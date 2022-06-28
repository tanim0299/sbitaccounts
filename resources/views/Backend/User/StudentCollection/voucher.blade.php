<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Invoice</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style type="text/css">
	body
	{
		font-family:monospace;
	}
	@import    url('https://fonts.googleapis.com/css2?family=Great+Vibes&family=Jura:wght@300;400;500;600;700&family=Kdam+Thmor+Pro&family=Oswald:wght@200;300;400;500;600;700&family=Poppins:ital,wght@0,600;0,700;0,800;0,900;1,600;1,700;1,800;1,900&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap');
	.dynamic_data{
		font-family: 'Jura', sans-serif;
	}
	.signature img {
    height: 37px;
    border-bottom: 1px dashed black;
}
.invoice {
    width: 137mm;
    height: auto;
    font-size: 11px;
    font-weight: bold;
    /*background: lightgray;*/
    border: 2px solid black;
    margin: auto;
}
td {
    border: 2px solid black !important;
}
th {
    border: 2px solid black !important;
}
</style>
<body>
@if($std_info)
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
		 					<td colspan="3">
		 						<div class="recipent_info">
		 							<b>Date: </b><span>{{$std_info->date}}</span><br>
		 							<b>Student ID: </b><span>{{$std_info->unique_id}}</span><br>
		 							<b>Recived From: </b><span>{{$std_info->name}}</span><br>
		 							<b>Phone: </b><span>{{$std_info->phone}}</span><br>
		 							<b>Adress: </b><span>{{$std_info->adress}},{{$std_info->upazila}},{{$std_info->district}}</span><br>
		 						</div>
		 					</td>
		 					<td colspan="3">
		 						<div class="recipent_info">
		 							@if($course_info)
									@foreach($course_info as $show_course_info)
									<b>Course({{$course_number++}}): </b><span class="course_name_data">{{$show_course_info->course_name}}&</span><br>
									@endforeach
									@endif
		 							<b>Print By: </b><span>{{$user_name}}</span><br>
		 						</div>
		 					</td>
		 				</tr>
		 				<tr>
		 					<td colspan="6" style="text-align:center;">Invioce For - {{$std_info->name}}</td>
		 				</tr>
		 				<tr>
		 					<th>Sl</th>
		 					<th>Date</th>
		 					<th>Total Course Fee</th>
		 					<th>Today Paid</th>
		 					<th>Total Paid</th>
		 					<th>Total Due</th>
		 				</tr>
		 				
		 				<tr>
		 					<td>{{$sl++}}</td>
		 					<td>{{$std_info->date}}</td>
		 					<td>{{$std_info->total_fee}}/-</td>
		 					<td>{{$std_info->collection_ammount}}/-</td>
		 					<td>{{$std_info->paid}}/-</td>
		 					<td>{{$std_info->due}}/-</td>
		 				</tr>
		 				
		 				<tr>
		 					<td colspan="6">
		 						<div class="row">
		 							<div class="ammount col-8">
			 							<b>Ammount In Words: </b><span>{{$ammount_word}} taka only...</span>
			 						</div>
			 						<div class="signature col-4" style="text-align:right;">
			 							<img src="{{asset('public')}}/images/signature.png"><br>
			 							<span>Recipent Signature</span>
			 						</div>
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
	</div>
@endif

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript">
		window.print();
	 
	
</script>
</body>
</html>