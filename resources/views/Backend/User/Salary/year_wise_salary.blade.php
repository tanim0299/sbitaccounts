@if($trainer)
@foreach($trainer as $showtrainer)
<div class="col-lg-6 col-md-6 col-12">
    <div class="trainer_single-box" style="margin-top: 20px;">
        <div class="box-header bg-success">
            <div class="row">
                <div class="col-6">
                    <div class="trainer_image">
                        <img src="{{asset('public')}}/Backend/Images/trainerImage/{{$showtrainer->image}}">
                    </div>
                    <div class="trainer_name">
                         <h3>{{$showtrainer->trainer_name}}</h3>
                    </div>
                    <div class="trainer_name">
                         <span>{{$showtrainer->designation}}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="trainer-salary" style="text-align:right;">
                        <label>Salary Info For This Year</label>
                        <span>Salary Ammount : {{$showtrainer->salary}}/-</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <table class="table table-striped table-bordered" style="margin-bottom: 0px;">
                <tr>
                    <th>Sl</th>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Given Ammount</th>
                    <th>Action</th>
                </tr>
                @if($salary_info)
                @foreach($salary_info as $showSalary_info)
                @if($showSalary_info->trainer_id == $showtrainer->id)
                @if($showSalary_info->year == $year)
                <tr>
                    <td>{{$sl++}}</td>
                    <td>{{$showSalary_info->month}}</td>
                    <td>{{$showSalary_info->year}}</td>
                    <td>{{$showSalary_info->ammount}}/-</td>
                    <td>
                        <a href="{{url('deleteSalary')}}/{{$showSalary_info->id}}" class="btn btn-outline-danger">Delete</a>
                    </td>
                </tr>
                @endif
                @endif
                @endforeach
                @endif
            </table>
        </div>
    </div>
</div>
@endforeach
@endif