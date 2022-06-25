@if($course_info)
<div class="row">
<!-- <span class="col-12" style="color:red">***Select Only One Trainer From Each Course***</span> -->
@foreach($course_info as $show_course_info)
<div class="col-lg-4 col-6">
    <div class="course_box">
        <div class="title">
            <!-- <input type="text" name="course_id[]" value="{{$show_course_info->id}}" hidden> -->
            <h5>{{$show_course_info->course_name}}</h5>
        </div>
        <div class="trainers">
            <div class="trainer_single">
                @php 
                $trainer_info = DB::table('trainer_appoint')
                                ->join('trainer_info','trainer_info.id','trainer_appoint.trainer_id')
                                ->where('student_id',$id)
                                ->get();

               
                @endphp
                @if($trainer_info)
                @foreach($trainer_info as $show_trainer_info)
                @if($show_course_info->id == $show_trainer_info->course_id)
                <li>
                    <img src="{{asset('public/Backend')}}/Images/trainerImage/{{$show_trainer_info->image}}" style="height:50px;width:50px;border-radius: 100px;"> <span>{{$show_trainer_info->trainer_name}}</span>   <i style="color:green" class="fa fa-check-circle"></i>
                </li>
                @endif
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endforeach

</div>
<div class="submit" style="margin-top: 20px;">
<a href="{{url('deleteAppTrainer')}}/{{$id}}" class="btn btn-outline-danger">Delete Appointed Trainer</a>
</div>
@endif