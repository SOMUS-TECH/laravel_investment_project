
@if(!empty($list))
@foreach($list as  $row)

<tr>
    <td>{{$row->email}} <input type="hidden" class="emails" value="{{$row->email}}"/></td>
    <td>{{$row->amount_deposit}}</td>
    <td>{{$row->balance}}</td>
    <td>{{$row->amount_to_recieve}}</td>
    <td>{{date('Y-M-d',$row->date)}}</td>
    <td>{{$row->reff}}</td>
    <td>{{date('Y-M-d',$row->start_date)}}</td>
    <td>{{date('Y-M-d',$row->end_date)}}</td>
    <td><button value="{{$row->id}}" type="button" class="btn btn-primary matches" data-toggle="modal" data-target=".bs-example-modal-lg">Matche User</button></td>
    
</tr>

@endforeach
@endif