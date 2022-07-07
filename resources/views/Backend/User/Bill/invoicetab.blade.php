<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Invoie</title>
	<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/bower_components/bootstrap/css/bootstrap.min.css">
	<link href="https://fonts.maateen.me/bangla/font.css" rel="stylesheet">
</head>
<style type="text/css">
	@import url('https://fonts.googleapis.com/css2?family=Great+Vibes&family=Jura:wght@300;400;500;600;700&family=Kdam+Thmor+Pro&family=Oswald:wght@200;300;400;500;600;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap');

	body{
		font-family: 'Bangla', sans-serif;
		font-size: 15px;
	}
	.invoce_wrapper {
    margin-top: 450px;
}
.table.table-striped.table-bordered tr
{
	border: 1px solid black;
}
.table.table-striped.table-bordered th
{
	border: 1px solid black;
}
.table.table-striped.table-bordered td
{
	border: 1px solid black;
}
</style>
<body>

	<div class="container" style="max-width:840px;">
		<div class="invoce_wrapper" style="font-family: 'Poppins', sans-serif;">
			<div class="invoice_info">
				<div class="row">
					 <div class="col-6">
					 	<div class="invoice_id">
					 		<span>Invoice ID : </span> {{$invoice_info->invoice_id}}
					 	</div>
					 </div>
					 <div class="col-6">
					 	<div class="invoice_date" style="text-align:right;">
					 		<span>Date : </span> {{$invoice_info->date}}
					 	</div>
					 </div>
					 <div class="col-12">
					 	<div class="invoice_date">
					 		<span>Client Name : </span> {{$invoice_info->client_name}}
					 	</div>
					 </div>
					 <div class="col-12">
					 	<div class="url">
					 		<span>Domain Name : </span> {{$invoice_info->url}}
					 	</div>
					 </div>
					 <div class="col-12">
					 	<div class="title" style="text-align:center;">
					 		<h4>{{$invoice_info->title}}</h4>
					 	</div>
					 </div>
				</div>
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Sl</th>
							<th>Description</th>
							<th>Taka</th>
						</tr>
					</thead>
					<tbody>
						@if($invoice_detail)
						@foreach($invoice_detail as $show_invoice_detail)
						<tr>
							<td>{{$sl++}}</td>
							<td>{!!$show_invoice_detail->description!!}</td>
							<td>{{$show_invoice_detail->ammount}}</td>
						</tr>
						@endforeach
						@endif
						<tr>
							<td colspan="2" style="text-align:right;">Total</td>
							<td>{{$total}}</td>
						</tr>
					</tbody>
				</table>
				<div class="number-word">
					<b>Ammount In Words : </b> <span style="text-transform:capitalize;">{{$ammount_word}} Taka Only.</span>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript">
	window.print();
</script>
</body>
</html>