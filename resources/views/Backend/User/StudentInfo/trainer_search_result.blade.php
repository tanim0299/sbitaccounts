@if($course_info)
<div class="row">
<span class="col-12" style="color:red">***Select Only One Trainer From Each Course***</span>
@foreach($course_info as $show_course_info)
<div class="col-lg-4 col-6">
    <div class="course_box">
        <div class="title">
            <input type="text" name="course_id[]" value="{{$show_course_info->id}}" hidden>
            <h5>{{$show_course_info->course_name}}</h5>
        </div>
        <div class="trainers">
            <div class="trainer_single">
                @php 
                $trainer_info = DB::table('trainer_info')
                                ->where('course_id',$show_course_info->id)
                                ->get();
                @endphp
                @if($trainer_info)
                @foreach($trainer_info as $show_trainer_info)
                @if($show_course_info->id == $show_trainer_info->course_id)
                <li>
                    <input type="checkbox" name="trainer_id[]" value="{{$show_trainer_info->id}}">  <img src="{{asset('public/Backend')}}/Images/trainerImage/{{$show_trainer_info->image}}" style="height:50px;width:50px;border-radius: 100px;"> <span>{{$show_trainer_info->trainer_name}}</span>
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
<input type="submit" name="submit" class="btn btn-success">
</div>
@endif