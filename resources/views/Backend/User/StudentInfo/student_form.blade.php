<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.dashboardpack.com/admindek-html/default/dashboard-crm.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Jun 2022 06:17:12 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<title>	Student Form</title>


<!--[if lt IE 10]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
<meta name="keywords" content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
<meta name="author" content="colorlib" />

<link rel="icon" href="{{asset('public/Backend')}}/assets/images/favicon.ico" type="image/x-icon">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/bower_components/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="{{asset('public/Backend')}}/assets/pages/waves/css/waves.min.css" type="text/css" media="all">

<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/assets/icon/feather/css/feather.css">

<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/assets/css/font-awesome-n.min.css">

<link rel="stylesheet" href="{{asset('public/Backend')}}/bower_components/chartist/css/chartist.css" type="text/css" media="all">

<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/assets/css/style.css">
<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/assets/css/widget.css">

<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/assets/pages/data-table/css/buttons.dataTables.min.css">
<!-- <link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"> -->


<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/assets/pages/advance-elements/css/bootstrap-datetimepicker.css">

<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/bower_components/bootstrap-daterangepicker/css/daterangepicker.css" />

<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/bower_components/datedropper/css/datedropper.min.css" />

<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/bower_components/spectrum/css/spectrum.css" />

<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/bower_components/jquery-minicolors/css/jquery.minicolors.css" />



<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/assets/icon/themify-icons/themify-icons.css">

<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/assets/icon/icofont/css/icofont.css">

<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/assets/icon/font-awesome/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/bower_components/switchery/css/switchery.min.css">

<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/bower_components/bootstrap-tagsinput/css/bootstrap-tagsinput.css" />

<!-- <link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/assets/css/style.css"><link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/assets/css/pages.css"> -->

<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/assets/pages/notification/notification.css">

<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/bower_components/animate.css/css/animate.css">

<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.14.3/dist/css/uikit.min.css" /> -->




</head>

<style type="text/css">

	/*.page-break {
    page-break-after: always;
}*/
	body[themebg-pattern=theme1]{
		background: none;
	}
	.page-a4 {
    height: 31.6cm;
    background: white;
    box-shadow: 0px 2px 3px black;
    margin-top: 5px;
    /*width: 21cm;*/
    margin: auto;
    overflow: hidden;
    /*margin-top: 30px;*/
}
body{
	font-family: raleway;
}

	.left_sidebar {
    /*height: 297mm;*/
    background: lightgray;
    border-top: 28px solid lightgray;
    padding: 5px 7px;
    background: lightgray;
    -webkit-print-color-adjust: exact;
}

.left_sidebar{
	background-attachment: fixed;
	background: lightgray;
}

.logo {
    background: white;
    padding: 10px 7px;
    text-align: center;
}
.logo p {
    margin-top: 17px !important;
}
.logo img {
    max-width: 130px;
}

.logo p {
    margin: 0;
    padding: 0;
    font-size: 14px;
    font-weight: bold;
    text-transform: uppercase;
}
.section_info {
    padding: 5px;
}

.section_info {margin-top: 20px;}

.section_title b {
    font-size: 15px;
    text-transform: uppercase;
    font-weight: bold;
    font-size: 12px;
}

.contact li {
    list-style: none;
    padding-left: 11px;
    font-size: 13px;
    padding-top: 10px;
}

.contact li i {
    background: #413ef1;
    color: white;
    padding: 5px;
    border-radius: 15px;
    -webkit-print-color-adjust: exact;
}

.contact li b {
    color: red;
    font-weight: bold;
}
.contact b {
    font-size: 12px;
}
.contact i {
    font-size: 11px;
}
i.feather.icon-user {}

.box {
    background: #6260cb;
    padding: 6px 15px;
    color: white;
    margin-top: 12px;
    -webkit-print-color-adjust: exact;
}
.title {
    margin-top: 26px;
}

.title h1 {
    text-transform: uppercase;
    font-weight: bold;
}

.section-box label {
    font-size: 14px;
}

.section-box {
    margin-top: 15px;
}

div#wrap-box {
    padding-right: 22px;
}
.std_image {
    text-align: center;
    padding-left: 70px;
}

.std_image img {
    height: 160px;
    width: 154px;
    border: 1px solid lightgray;
    padding: 10px;
    margin: auto;
}
.section-box {}

.section-box input {
    background: white;
    border: 1px solid lightgray;
    -webkit-print-color-adjust: exact;
}

.section-box input:focus {
    box-shadow: none;
    border: 1px solid lightgray;
}
.section-box textarea {
    background: white;
    border: 1px solid lightgray;
    -webkit-print-color-adjust: exact;
}

.section-box textarea:focus {
    box-shadow: none;
    border: 1px solid lightgray;
    -webkit-print-color-adjust: exact;
}

.contact input {
    background: white;
    border: 1px solid lightgray;
    -webkit-print-color-adjust: exact;
}

.contact input:focus {
    box-shadow: none;
    border: 1px solid lightgray;
}
.form-control:disabled, .form-control[readonly] {
    background: white !important;
    -webkit-print-color-adjust: exact;
}
</style>



<body>

@if($data)
	<div class="mian-box">
		<div class="container-fluid">
			<div class="page-a4 page-break">
				<div class="row">
					<div class="col-4">
						<div class="border">
							
						</div>
						 <div class="left_sidebar">
						 	<div class="logo">
						 		<img src="{{asset('public/public/Backend')}}/images/logo.png" class="img-fluid"><br>
						 		<p>Skill Based IT-SBIT</p>
						 	</div>
						 	<div class="section_info">
						 		<div class="section_title">
						 			<b>Company Contact Info</b>
						 		</div>
						 		<div class="contact">
						 			<li><i class="feather icon-phone"></i> <span>+880 1840-241895</span></li>
						 			<li><i class="feather icon-phone"></i> <span>+880 1842-981240</span></li>
						 			<li><i class="feather icon-mail"></i> <span>moreinfo.sbit@gmail.com</span></li>
						 			<li><i class="feather icon-map-pin"></i> <span><b>Dhaka Office :</b>House #535, Road #8, Avenue #6, Mirpur DOHS, Dhaka-1216</span></li>
						 			<li><i class="feather icon-map-pin"></i> <span><b>Feni Office: </b>Hazi Fazal Master Lane, Yusuf Tower(2nd Floor), Mizan Road, Feni</span></li>
						 		</div>
						 	</div>
						 	<div class="section_info">
						 		<div class="section_title">
						 			<b>Student Course Info</b>
						 		</div>
						 		<div class="contact">
						 			@php
						 			$course = DB::table('student_course_info')
                                          ->where('student_id',$data->id)
                                          ->join('course_infos','course_infos.id','=','student_course_info.course_id')
                                          ->select('course_infos.course_name')
                                          ->get(); 
						 			@endphp
						 			@if($course)
						 			@foreach($course as $showcourse)
						 			<li><i class="feather icon-check"></i> <span>{{$showcourse->course_name}}</span></li>
						 			@endforeach
						 			@endif
						 		</div>
						 	</div>

						 	<div class="section_info">
						 		<div class="section_title">
						 			<b>Payment Info</b>
						 		</div>
						 		<div class="contact">
						 			<b style="margin-top: 5px;">Total Fee : </b><input type="text" name="" class="form-control" readonly value="{{$data->main_fee}}">
						 			<b style="margin-top: 5px;">Discount : </b><input type="text" name="" class="form-control" readonly value="{{$data->discount}}">
						 			<b style="margin-top: 5px;">Course Fee : </b><input type="text" name="" class="form-control" readonly value="{{$data->total_fee}}">
						 			<b style="margin-top: 5px;">Discount(%): </b><input type="text" name="" class="form-control" readonly value="{{$data->discount_per}}">
						 			<b style="margin-top: 5px;">Join Date : </b><input type="text" name="" class="form-control" readonly value="{{$data->join_date}}">
						 			<b style="margin-top: 5px;">Class Time : </b><input type="text" name="" class="form-control" readonly value="{{$data->class_time}}">
						 		</div>
						 	</div>

						 	<div class="section_info">
						 		<div class="section_title">
						 			<b>Aggrement</b>
						 		</div>
						 		<div class="contact">
						 			<i>"I agree to follow the rules & regulation of SBIT. I promise that i will never break down the rules and also promise that i will attend class regularly"</i>
						 		</div>
						 	</div>

						 	<div class="section_info">
						 		<div class="section_title">
						 			<!-- <b>Authorise</b> -->
						 		</div>
						 		<div class="contact">
						 			<b style="margin-top: 5px;">Student Signature : </b><input type="text" name="" class="form-control" readonly>
						 			<b style="margin-top: 5px;">Authority Signature : </b><input type="text" name="" class="form-control" readonly>
						 		</div>
						 	</div>
						 </div>
					</div>
					<div class="col-8">
						<div class="right-body">
							<div class="title">
								<h1>Admission Form</h1>
							</div>
							<div class="row">
								<div class="col-6">
									<div class="section-box">
										<label>Student ID</label>
										<input type="text" name="" readonly class="form-control" value="{{$data->unique_id}}">
									</div>
									<div class="section-box">
										<label>Date</label>
										<input type="text" name="" readonly class="form-control" value="{{$data->date}}">
									</div>
									<div class="section-box">
										<label>Type	</label>
										<input type="text" name="" readonly class="form-control" value="{{$data->type}}">
									</div>
								</div>
								<div class="std_image">
									<img src="{{asset('public/public/Backend')}}/images/studentImage/{{$data->image}}" class="img-fluid">
								</div>
							</div>
							<div class="box">
								<i class="feather icon-user"></i> <span>Personal Information</span>
							</div>
							<div class="row" id="wrap-box">
								<div class="col-12">
									<div class="section-box">
										<label>Name	</label>
										<input type="text" name="" readonly class="form-control" value="{{$data->name}}">
									</div>
								</div>
								<div class="col-6">
									<div class="section-box">
										<label>Fathers Name	</label>
										<input type="text" name="" readonly class="form-control" value="{{$data->fathers_name}}">
									</div>
								</div>
								<div class="col-6">
									<div class="section-box">
										<label>Mothers Name	</label>
										<input type="text" name="" readonly class="form-control" value="{{$data->mothers_name}}">
									</div>
								</div>
								<div class="col-6">
									<div class="section-box">
										<label>Gender</label>
										<input type="text" name="" readonly class="form-control" value="{{$data->gender}}">
									</div>
								</div>
								<div class="col-6">
									<div class="section-box">
										<label>Nationality</label>
										<input type="text" name="" readonly class="form-control" value="{{$data->nationality}}">
									</div>
								</div>
								<div class="col-6">
									<div class="section-box">
										<label>Religion</label>
										<input type="text" name="" readonly class="form-control" value="{{$data->religion}}">
									</div> 
								</div>
								<div class="col-6">
									<div class="section-box">
										<label>Institute Name</label>
										<input type="text" name="" readonly class="form-control" value="{{$data->institute}}">
									</div>
								</div>
								<div class="col-6">
									<div class="section-box">
										<label>Technology/Group</label>
										<input type="text" name="" readonly class="form-control" value="{{$data->group}}">
									</div>
								</div>
								<div class="col-6">
									<div class="section-box">
										<label>Semister/Year</label>
										<input type="text" name="" readonly class="form-control" value="{{$data->semister}}">
									</div>
								</div>
							</div>
							<div class="box">
								<i class="feather icon-phone"></i> <span>Contact Information</span>
							</div>
							<div class="row" id="wrap-box">
								<div class="col-6">
									<div class="section-box">
										<label>Phone</label>
										<input type="text" name="" readonly class="form-control" value="{{$data->phone}}">
									</div>
								</div>
								<div class="col-6">
									<div class="section-box">
										<label>Email</label>
										<input type="text" name="" readonly class="form-control" value="{{$data->email}}">
									</div>
								</div>
								<div class="col-6">
									<div class="section-box">
										<label>District	</label>
										<input type="text" name="" readonly class="form-control" value="{{$data->district}}">
									</div>
								</div>
								<div class="col-6">
									<div class="section-box">
										<label>Upazila</label>
										<input type="text" name="" readonly class="form-control" value="{{$data->upazila}}">
									</div>
								</div>
								<div class="col-12">
									<div class="section-box">
										<label>Adress</label>
										<textarea readonly class="form-control">{{$data->adress}}</textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- <div class="download_btn text-center mt-2 pb-2">
				<a href="{{url('/downloadForm')}}/{{$data->id}}" class="btn btn-outline-success">Download Form</a>
			</div> -->
		</div>
	</div>
	@endif

</body>

<script type="text/javascript" src="{{asset('public/Backend')}}/bower_components/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('public/Backend')}}/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="{{asset('public/Backend')}}/bower_components/popper.js/js/popper.min.js"></script>
<script type="text/javascript" src="{{asset('public/Backend')}}/bower_components/bootstrap/js/bootstrap.min.js"></script>

<script src="{{asset('public/Backend')}}/assets/pages/waves/js/waves.min.js"></script>

<script type="text/javascript" src="{{asset('public/Backend')}}/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>

<script src="{{asset('public/Backend')}}/assets/pages/chart/float/jquery.flot.js"></script>
<script src="{{asset('public/Backend')}}/assets/pages/chart/float/jquery.flot.categories.js"></script>
<script src="{{asset('public/Backend')}}/assets/pages/chart/float/curvedLines.js"></script>
<script src="{{asset('public/Backend')}}/assets/pages/chart/float/jquery.flot.tooltip.min.js"></script>

<script src="{{asset('public/Backend')}}/assets/pages/widget/amchart/amcharts.js"></script>
<script src="{{asset('public/Backend')}}/assets/pages/widget/amchart/serial.js"></script>
<script src="{{asset('public/Backend')}}/assets/pages/widget/amchart/light.js"></script>

<script src="../../../developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="{{asset('public/Backend')}}/assets/pages/google-maps/gmaps.js"></script>

<script src="{{asset('public/Backend')}}/assets/js/pcoded.min.js"></script>
<script src="{{asset('public/Backend')}}/assets/js/vertical/vertical-layout.min.js"></script>
<script type="text/javascript" src="{{asset('public/Backend')}}/assets/pages/dashboard/crm-dashboard.min.js"></script>
<script type="text/javascript" src="{{asset('public/Backend')}}/assets/js/script.min.js"></script>

<!-- datatables -->
<script src="{{asset('public/Backend')}}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('public/Backend')}}/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>

<script src="{{asset('public/Backend')}}/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('public/Backend')}}/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
<!-- <script src="{{asset('public/Backend')}}/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script> -->
<script src="{{asset('public/Backend')}}/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<!-- <script src="{{asset('public/Backend')}}/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script> -->

<script src="{{asset('public/Backend')}}/assets/pages/data-table/js/data-table-custom.js"></script>
<script type="text/javascript" src="{{asset('public/Backend')}}/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript" src="{{asset('public/Backend')}}/assets/pages/advance-elements/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript" src="{{asset('public/Backend')}}/bower_components/bootstrap-daterangepicker/js/daterangepicker.js"></script>

<script type="text/javascript" src="{{asset('public/Backend')}}/bower_components/datedropper/js/datedropper.min.js"></script>


<script type="text/javascript" src="{{asset('public/Backend')}}/bower_components/spectrum/js/spectrum.js"></script>
<script type="text/javascript" src="{{asset('public/Backend')}}/bower_components/jscolor/js/jscolor.js"></script>

<script type="text/javascript" src="{{asset('public/Backend')}}/bower_components/jquery-minicolors/js/jquery.minicolors.min.js"></script>

<script type="text/javascript" src="{{asset('public/Backend')}}/assets/pages/advance-elements/custom-picker.js"></script>



<script type="text/javascript" src="{{asset('public/Backend')}}/bower_components/modernizr/js/modernizr.js"></script>
<script type="text/javascript" src="{{asset('public/Backend')}}/bower_components/modernizr/js/css-scrollbars.js"></script>

<script type="text/javascript" src="{{asset('public/Backend')}}/bower_components/switchery/js/switchery.min.js"></script>

<script type="text/javascript" src="{{asset('public/Backend')}}/bower_components/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script>
<!-- <script src="../../../cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.10.4/typeahead.bundle.min.js"></script> -->

<!-- <script type="text/javascript" src="{{asset('public/Backend')}}/bower_components/bootstrap-maxlength/js/bootstrap-maxlength.js"></script> -->

<script type="text/javascript" src="{{asset('public/Backend')}}/assets/pages/advance-elements/swithces.js"></script>
<!-- <script src="{{asset('public/Backend')}}/assets/js/pcoded.min.js"></script> -->
<!-- <script src="{{asset('public/Backend')}}/assets/js/vertical/vertical-layout.min.js"></script> -->
<script src="{{asset('public/Backend')}}/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="{{asset('public/Backend')}}/assets/js/script.js"></script>



<script src="https://cdn.jsdelivr.net/npm/uikit@3.14.3/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.14.3/dist/js/uikit-icons.min.js"></script>

<script type="text/javascript">
	window.print();
	// window.close();
	// window.onafter = window.close;
</script>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->


</body>

<!-- Mirrored from demo.dashboardpack.com/admindek-html/default/dashboard-crm.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Jun 2022 06:17:14 GMT -->
</html>