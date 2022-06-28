@if($data)
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{$data->name}}</title>
</head>
<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Kdam+Thmor+Pro&family=Oswald:wght@200;300;400;500;600;700&family=Poppins:ital,wght@0,600;0,700;0,800;0,900;1,600;1,700;1,800;1,900&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
<style type="text/css">

*{padding: 0;margin: 0;}

@import url('https://fonts.googleapis.com/css2?family=Great+Vibes&family=Kdam+Thmor+Pro&family=Oswald:wght@200;300;400;500;600;700&family=Poppins:ital,wght@0,600;0,700;0,800;0,900;1,600;1,700;1,800;1,900&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap');

.std_info{
	font-family: 'Great Vibes', cursive;
}

body{
	/*font-family: 'Kdam Thmor Pro', sans-serif;*/
	/*font-family: 'Poppins', sans-serif;*/

	
}
	.certificate-body{
		height: 16cm;
		width: 22.7cm;
		background: url("{{asset('public')}}/public/certificate_background.jpg");
		/*background-attachment: fixed;*/
		background-repeat: no-repeat;
		-webkit-print-color-adjust: exact;
		position: relative;
		margin: auto;
	}
	.student_id {
    position: absolute;
    top: 60px;
    left: 70px;
    color: black;
    font-weight: bold;
}
.logo {
    float: right;
}

.logo img {
    height: 50px;
    width: 127px;
    position: absolute;
    left: 650px;
    top: 64px;
}
.logo {}

.title {
    text-align: center;
    position: absolute;
    text-align: center;
    left: 258px;
    top: 110px;
}

.title p {
    font-size: 31px;
    font-weight: bold;
    margin: 0;
}

.title b {
    text-transform: uppercase;
    font-size: 43px;
}
.frame{
	background : url("{{asset('public')}}/public/frame.png");
	background-repeat: no-repeat;
	-webkit-print-color-adjust: exact;
	position: absolute;
}
.frame {
    top: 193px;
    left: 262px;
    /*padding: 41px;*/
}
.frame {
    height: 36px;
    width: 298px;
    text-align: center;
    padding-top: 7px;
}
.certificate-text {
    position: absolute;
    top: 260px;
    /*text-align: center;*/
    left: 90px;
}

.certificate-text p {
    font-size: 18px;
}
.name {
    position: absolute;
    top: 234px;
    left: 254px;
    text-align: center;
}

.name b {
    font-size: 32px;
}
.f-name {
    position: absolute;
    top: 289px;
    left: 158px;
    text-align: center;
}

.f-name span {
    font-size: 21px;
}
.m-name {
    position: absolute;
    top: 289px;
    left: 476px;
    text-align: center;
}

.m-name span {
    font-size: 21px;
}
.district {
    position: absolute;
    top: 334px;
    left: 172px;
    text-align: center;
}

.district span {
    font-size: 21px;
}
.course {
    position: absolute;
    top: 336px;
    left: 545px;
    text-align: center;
}

.course span {
    font-size: 18px;
}
.handover-date {position: absolute;bottom: 72px;text-align: center;left: 115px;}
.signature {position: absolute;bottom: 72px;text-align: center;right: 121px;}

.handover-date p {
    border-bottom: 1px solid black;
    padding-bottom: 8px;
}
.signature img {
    height: 75px;
    width: 138px;
    border-bottom: 1px solid black;
}
.download_btn a {
    text-decoration: none;
    color: white;
    background: black;
    padding: 8px 14px;
    border-radius: 8px;
}
</style>
<body>
<div class="certificate_wrapper">
	<div class="certificate-body">
		<div class="student_id">
			<span>Student ID : {{$data->unique_id}}</span>
		</div>
		<div class="logo">
			<img src="{{asset('public/public')}}/Backend/images/logo.png">
		</div>
		<div class="title">
			<p>Course Completion</p>
			<b>Certificate</b>
		</div>
		<div class="frame">
			<span>The certificate proudly presented to</span>
		</div>
		<!-- @php 
		$course = DB::table('student_course_info')
				  ->where('student_id',$data->id)
				  ->where('course_id',$course_id)
				  ->join('course_infos','course_infos.id','=','student_course_info.course_id')->select('course_infos.course_name','student_course_info.*')->first();
		@endphp -->
		<div class="certificate-text">
			@if($course)
			<p>
				Mr/Ms/Mrs ..................................................................................................................<br><br>
				Father ..........................................................Mother .............................................................<br><br>District ...................... Has Successsfully Completed Our ............................................. <br><br>Course From {{$data->join_date}} to {{$course->complete_date}}.
			</p>
			@endif
		</div>
		<div class="std_info">
			<div class="name">
				<b>{{$data->name}}</b>
			</div>
			<div class="f-name">
				<span>{{$data->fathers_name}}</span>
			</div>
			<div class="m-name">
				<span>{{$data->mothers_name}}</span>
			</div>
			<div class="district">
				<span>{{$data->district}}</span>
			</div>
			<div class="course">
				@php 
				$course = DB::table('student_course_info')
						  ->where('student_id',$data->id)
						  ->where('course_id',$course_id)
						  ->join('course_infos','course_infos.id','=','student_course_info.course_id')->select('course_infos.course_name')->first();
				@endphp
				@if($course)
				<span>{{$course->course_name}}</span>
				@endif
			</div>
		</div>
		<div class="handover-date">
			<p>{{$date}}</p>
			<b>Date</b>
		</div>
		<div class="signature">
			<img src="{{asset('public/')}}/images/signature.png"><br>
			<b>Signature</b>
		</div>
	</div>
</div>
<div class="download_btn" style="text-align:center;margin-top: 20px;">
	<a href="{{url('/downloadCertificate')}}/{{$data->id}}/{{$course_id}}">Download Certificate</a>
</div>
</body>
</html>
@endif