@foreach($history as $row)
    
 <tr>
    <td>{{$row->reff}}</td>
    <td>{{$row->amount_deposit}}</td>
    <td>{{$row->amount_to_recieve}}</td>
    <td>{{date("m/d/y",$row->date)}}</td>
    <td>{{$row->balance}}</td>
</tr>
@endforeach