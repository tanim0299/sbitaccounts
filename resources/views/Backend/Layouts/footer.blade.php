<div id="styleSelector">
</div>

</div>
</div>
</div>
</div>





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



<!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->

<script type="text/javascript">
    
   function courseFee(id)
   {
   	$("#course_id-"+id).on('change',function(){
   		var id = $(this).val();

   		var presentValue = $("#main_fee").val();

   		// var default = 

   		if($('#course_id-'+id).is(':checked'))
   		{
   			$.ajax({

   				headers : {
                    'X-CSRF-TOKEN' : "{{ csrf_token() }}"
                },

                url : '{{url('getCourseFee')}}',

                type : 'POST',

                data : {

                    id : id,p_value:presentValue
                },

                success : function(data)
                {
                	$('#main_fee').val(data);
                    $('#total_fee').val(data);
                } 
   		});


   		}
   		else if($('#course_id-'+id).is(':not(:checked)'))
   		{
   			// $("#fee").html("Please Select A Course");
   			$.ajax({

   				headers : {
                    'X-CSRF-TOKEN' : "{{ csrf_token() }}"
                },

                url : '{{url('subCourseFee')}}',

                type : 'POST',

                data : {

                    id : id,p_value:presentValue
                },

                success : function(data)
                {
                	$('#main_fee').val(data);
                    $('#total_fee').val(data);
                } 
   		});

   		}
   		else
   		{
   			$("#fee").html(data);
   		}


   		// alert(id);
   	});


   }

   
   $(document).ready(function(){


    $("#discount_ammount").on('keyup',function(){

        var discount_ammount = parseInt($(this).val());

        var main_fee = parseInt($("#main_fee").val());

        // alert(main_fee);

        if(discount_ammount > main_fee)
        {
            UIkit.notification({
                message: 'Invalid Discount Ammount!',
                status: 'primary',
                pos: 'top-right',
                timeout: 5000
            });
            $("#discount_ammount").val(0);
            $("#total_fee").val(0);
        }
        else
        {
            var total_fee = main_fee - discount_ammount;

            $("#total_fee").val(total_fee);
        }

    });



    
        
    


   });


   $(document).ready(function(){

    $("#discount_ammount").on('keyup',function(){

        var main_fee = parseInt($("#main_fee").val());

        var discount_ammount = parseInt($("#discount_ammount").val());

        var discount_percentage = (discount_ammount/main_fee * 100);

        var sign = "%";

        $("#discount_per").val(discount_percentage.toFixed(0)+sign);

        // alert();

    });

   });




   

</script>

</body>

<!-- Mirrored from demo.dashboardpack.com/admindek-html/default/dashboard-crm.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Jun 2022 06:17:14 GMT -->
</html>