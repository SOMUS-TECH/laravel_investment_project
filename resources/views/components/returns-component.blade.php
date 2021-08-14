@foreach($returns as  $row)

<tr>
    <td id={{$row->id}}><script>counter({{$row->id}},'{{date("d M, y",$row->end_date)}}');
</script></td>
    <td>{{$row->reff_r}}</td>
    <td>{{$row->amount_g}}</td>
    <td>{{$row->fullname}}</td>
    <td>{{$row->phone}}</td>
    <td>{{$row->start_date}}</td>
    <td>{{date("d M, Y",$row->end_date)}}
        <input type="hidden" value="{{$row->id}}" id="rowid" />
    </td>
    <td><button id="confirm"  class="btn btn-small btn-primary">Confirm</button></td>
    <td><a target="_blank" href="{{url('storage/pot/'.$row->pot)}}" class="btn btn-small btn-success" >View POT</a></td>
</tr>

@endforeach