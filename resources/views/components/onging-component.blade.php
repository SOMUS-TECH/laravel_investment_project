@foreach($ongoing as $row)
    @if($row->matched == 1)
        @php
        $row->matched = "YES"
        @endphp

    @else
        @php
        $row->matched = "NO"
        @endphp
    @endif
 <tr>
    <td>{{$row->reff}}</td>
    <td>{{$row->amount_deposit}}</td>
    <td>{{$row->amount_to_recieve}}</td>
    <td>{{date("Y-m-d",$row->date)}}</td>
    <td>{{$row->matched}}</td>
    <td>{{$row->balance}}</td>
</tr>
@endforeach