@if($data)

@foreach($data as $showdata)
<tr>
    <td>{{$sl++}}</td>
    <td>{{$showdata->description}}</td>
    <td>{{$showdata->ammount}}</td>
    <td>
        <button class="btn btn-outline-danger" id="deleteCurrent_{{$showdata->id}}" name="{{$showdata->id}}" onclick="DeleteCurrent({{$showdata->id}})">Remove</button>
    </td>
</tr>
@endforeach
<!-- <tr>
    <td colspan="2" style="text-align:right">Total</td>
    <td colspan="2"><u><b>{{$total}}</b></u></td>
</tr> -->

@endif