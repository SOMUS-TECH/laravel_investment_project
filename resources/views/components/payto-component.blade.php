@foreach($payto as  $row)

<tr>
    <td id={{$row->id}}><script>counter({{$row->id}},'{{date("d M, y",$row->end_date)}}');
</script></td>
    <td>{{$row->reff_g}}</td>
    <td>{{$row->amount_g}}</td>
    <td>{{$row->fullname}}</td>
    <td>{{$row->bank_name}}</td>
    <td>{{$row->account_number}}</td>
    <td>{{$row->phone}}</td>
    <td>{{$row->start_date}}</td>
    <td>{{date("d M, Y",$row->end_date)}}</td>
    <td><a href="/upload?id={{$row->id}}" class="btn btn-small btn-primary">Upload</a></td>
</tr>

@endforeach