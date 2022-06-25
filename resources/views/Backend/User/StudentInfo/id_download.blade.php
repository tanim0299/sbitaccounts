@if($data)
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{$data->name}}</title>
</head>
<style type="text/css">
	*{margin: 0;padding: 0;}
	body{
		font-family: system-ui;
    -webkit-print-color-adjust: exact;
		
	}
	.page_a4 {
    width: 21.7cm;
    margin: auto;
    /*box-shadow: 1px 1px 4px -2px black;*/
    padding: 11px;
}
#first{
	/*float: left;*/
}
.card_single {
    height: 3.25in;
    width: 1.75in;
    overflow: hidden;
    box-shadow: 2px 2px 1px -1px black;
    border: 1px solid lightgray;
    float: left;
    /*margin-right: 20px;*/
    margin-left: 50px;
}

.logo img {
    height: 27px;
}
.card_header {
    text-align: center;
    margin-top: 5px;
}
.c-name {
    background: #04a204;
    color: white;
    -webkit-print-color-adjust: exact;
}

.c-name b {
    font-size: 12px;
    text-transform: uppercase;
}
.type span {
    font-size: 8px;
    text-transform: uppercase;
}

.type {
    border-bottom: 1px dashed lightgray;
}
.std_id span {
    font-size: 9px;
}

.std_id b {
    font-size: 9px;
    text-transform: uppercase;
}

.std_id {
}
.student_image {
    text-align: center;
}

.student_image img {
    height: 81px;
    width: 81px;
    margin-top: 4px;
    border: 1px solid lightgray;
    padding: 3px;
}
.student_name b {
    text-transform: uppercase;
    font-size: 10px;
    font-family: system-ui;
}
table {
    /* border: 1px solid lightgray; */
    font-size: 7px;
    text-align: left;
    width: 100%;
}

table tbody tr td {
    /* border: 1px solid white; */
    padding: 5px 1px;
}

table {}

table tbody tr {
    background: #04a204;
    color: white;
    -webkit-print-color-adjust: exact;
}
.adress b {
    border-bottom: 1px solid lightgray;
    font-size: 10px;
}

.adress span {
    font-size: 8px;
    word-spacing: 0px;
    padding: 0px;
}
.others {
    background: #04a204;
    color: white;
    font-size: 8px;
    text-align: left;
    padding-left: 8px;
    padding: 4px 5px;
}
.signature img {
    height: 42px;
    border-bottom: 1px dashed lightgray;
}

.ceo b {
    text-transform: uppercase;
    font-size: 8px;
}

.ceo span {
    font-size: 10px;
}

.ceo p {
    font-size: 10px;
}
.download_btn a {
    text-decoration: none;
    color: white;
    background: black;
    padding: 10px 22px;
    border-radius: 5px;
}
</style>
<body>

<div class="page_a4">
	<div class="card-wrapper">
		<div class="card_single" id="first">
			<div class="card_header">
				<div class="logo">
					<img src="data:image/png;base64,{{base64_encode(file_get_contents('http://localhost/sbitaccounts/public/public/Backend/images/logo.png')) }}" class="img-fluid">
				</div>
				<div class="c-name">
					<b>Skill Based IT</b>
				</div>
				<div class="type">
					<span>Student id Card</span>
				</div>
				<div class="std_id">
					<b>Student ID : </b> <span>{{$data->unique_id}}</span>
				</div>
				<div class="student_image">
					@php
					$url='http://localhost/sbitaccounts/public/public/Backend/images/studentImage/';
					$image=$url.$data->image;

					@endphp
					<img src="data:image/png;base64,{{base64_encode(file_get_contents($image)) }}" class="img-fluid">
				</div>
				<div class="student_name">
					<b>{{$data->name}}</b>
				</div>
				<div class="student_othersinfo">
					<table>
						<tr>
							<td>Course Name</td>
							<td>
								@php
								$course = DB::table('student_course_info')
                                            ->join('course_infos','course_infos.id','student_course_info.course_id')
                                           ->where('student_id',$data->id)
                                           ->select('course_infos.course_name','course_infos.id','student_course_info.status')
                                           ->get();
								@endphp
								@if($course)
								@foreach($course as $showcourse)
								<span>{{$showcourse->course_name}}</span><br>
								<!-- <li>Professional Graphics Design</li> -->
								@endforeach
								@endif
							</td>
						</tr>
						<tr>
							<td>Phone No</td>
							<td>{{$data->phone}}</td>
						</tr>
						<tr>
							<td>Class Time</td>
							<td>{{$data->class_time}}</td>
						</tr>
						<tr>
							<td>Address</td>
							<td>{{$data->adress}},{{$data->upazila}},{{$data->district}}</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="card_single">
			<div class="card_header">
				<div class="logo">
					<img src="data:image/png;base64,{{base64_encode(file_get_contents('http://localhost/sbitaccounts/public/public/Backend/images/logo.png')) }}" class="img-fluid">
				</div>
				<div class="adress">
					<b>Dhaka Office</b><br>
					<span>House#535, Road#8, Avenue#6, 
					Mirpur DOHS, Dhaka-1216, Bangladesh</span>
				</div>
				<div class="adress">
					<b>Feni Office</b><br>
					<span>Hazi Fazal Master Lane, Yusuf Tower(2nd Floor),Mizan Road, Feni</span>
				</div>
				<div class="others" style="padding: 10px;">
					<li>This card is not transfarable</li>
					<li>If the card lost, the recipent is requested to send the adress given above</li>
					<li>Contact : 01840-241895,01842-9815240</li>
				</div>
				<div class="signature">
					<img src="data:image/png;base64,{{base64_encode(file_get_contents('http://localhost/sbitaccounts/public/images/Signature.png')) }}" class="img-fluid">
					<div class="ceo">
						<b>Md Abdul Mannan Sourov</b>
						<p>CEO</p>
						<p>Skill Based IT</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- <div class="download_btn" style="margin-top:20px;text-align: center;">
	<a href="{{url('download_id')}}/{{$data->id}}" class="btn btn-success">Download ID Card</a>
</div> -->


</body>
</html>
@endif