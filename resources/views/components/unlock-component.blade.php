@foreach($unlock as  $row)
    @php
    if($row->activate == 0){
        $reasons = 'Activation fee';
    }else{
        $reasons = 'failed to make payment';
    }
    @endphp
<tr>
    <td>{{$row->fullname}}</td>
    <td>{{$row->email}}</td>
    <td>{{$row->bank_name}}</td>
    <td>{{$row->account_number}}</td>
    <td>{{$row->phone}}</td>
    <td>{{$reasons}}</td>
    <td><button value="{{$row->id}}" type="button" class="btn btn-primary unban" data-toggle="modal" data-target=".bs-example-modal-lg">Unlock User</button></td>
</tr>

@endforeach