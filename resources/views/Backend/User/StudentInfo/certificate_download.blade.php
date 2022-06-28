
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{$data->name}}</title>
</head>
<style type="text/css">

*{padding: 0;margin: 0;}

@import url('https://fonts.googleapis.com/css2?family=Great+Vibes&family=Kdam+Thmor+Pro&family=Oswald:wght@200;300;400;500;600;700&family=Poppins:ital,wght@0,600;0,700;0,800;0,900;1,600;1,700;1,800;1,900&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap');

.std_info{
	font-family: 'Great Vibes', cursive !important;
}
.certificate-body{
	height: 100%;
	width: 100%;
	background: url("data:image/png;base64,{{base64_encode(file_get_contents('http://localhost/sbitaccounts/public/public/certificate_background.jpg')) }}");
	/*background-attachment: fixed;*/
	background-repeat: no-repeat;
	-webkit-print-color-adjust: exact;
	position: relative;
	/*margin: auto;*/
	/*margin-top: 5px;*/
	top: 0;
	overflow: hidden;
	page-break-inside: auto;
	background-size: cover;

}

.content_wrap{
	position: absolute;
	left: 40px;
	top: 10px;
	width: 100%;
}
	.student_id {
    position: absolute;
    top: 60px;
    left: 70px;
    color: black;
    font-weight: bold;
}
.logo {
    /*float: right;*/
    position: absolute;
}

.logo img {
    height: 50px;
    width: 127px;
    position: absolute;
    left: 870px;
    top: 64px;
}
.logo {}

.title {
    text-align: center;
    position: absolute;
    text-align: center;
    left: 330px;
    top: 110px;
}

.title p {
    font-size: 31px;
    font-weight: bold;
    margin: 0;
}

.title b {
    text-transform: uppercase;
    font-size: 48px;
}
.frame{
	background : url("data:image/png;base64,{{base64_encode(file_get_contents('http://localhost/sbitaccounts/public/public/frame.png')) }}");
	background-repeat: no-repeat;
	-webkit-print-color-adjust: exact;
	position: absolute;
}
.frame {
    top: 200px;
    left: 350px;
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
    top: 280px;
    /*text-align: center;*/
    left: 130px;
}

.certificate-text p {
    font-size: 22px;
}
.name {
    position: absolute;
    top: 254px;
    left: 300px;
    text-align: center;
}

.name b {
    font-size: 32px;
}
.f-name {
    position: absolute;
    top: 325px;
    left: 230px;
    text-align: center;
}

.f-name i {
    font-size: 23px;
}
.m-name {
    position: absolute;
    top: 325px;
    left: 600px;
    text-align: center;
}

.m-name i {
    font-size: 23px;
}
.district {
    position: absolute;
    top: 375px;
    left: 220px;
    text-align: center;
}

.district i {
    font-size: 23px;
}
.course {
    position: absolute;
    top: 375px;
    left: 650px;
    text-align: center;
}

.course i {
    font-size: 23px;
}
.handover-date {position: absolute;bottom: 80px;text-align: center;left: 115px;}
.signature {position: absolute;bottom: 80px;text-align: center;right: 121px;}

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
	@if($data)
	<div class="certificate-body" style="">
		<div class="content_wrap">
			<div class="student_id">
				<span>Student ID : {{$data->unique_id}}</span>
			</div>
			<div class="logo">
				<img src="data:image/png;base64,{{base64_encode(file_get_contents('http://localhost/sbitaccounts/public/public/Backend/images/logo.png')) }}">
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
					Father ..........................................................Mother .............................................................<br><br>District ...................... Has Successsfully Completed Our ............................................................ <br><br>Course From {{$data->join_date}} to {{$course->complete_date}}.
				</p>
				@endif
			</div>
			<div class="std_info">
				<div class="name">
					<i><b>{{$data->name}}</b></i>
				</div>
				<div class="f-name">
					<i>{{$data->fathers_name}}</i>
				</div>
				<div class="m-name">
					<i>{{$data->mothers_name}}</i>
				</div>
				<div class="district">
					<i>{{$data->district}}</i>
				</div>
				<div class="course">
					@php 
					$course = DB::table('student_course_info')
							  ->where('student_id',$data->id)
							  ->where('course_id',$course_id)
							  ->join('course_infos','course_infos.id','=','student_course_info.course_id')->select('course_infos.course_name')->first();
					@endphp
					@if($course)
					<i>{{$course->course_name}}</i>
					@endif
				</div>
			</div>
			<div class="handover-date">
				<p>{{$date}}</p>
				<b>Date</b>
			</div>
			<div class="signature">
				<img src="data:image/png;base64,{{base64_encode(file_get_contents('http://localhost/sbitaccounts/public/images/Signature.png')) }}"><br>
				<b>Signature</b>
			</div>
		</div>
		</div>
	@endif
</div>
</body>
</html>
