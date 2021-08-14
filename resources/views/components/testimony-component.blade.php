@foreach($test as  $row)
   
<tr>
    <td>{{$row->fullname}}</td>
    <td>{{$row->email}}</td>
    <td>{{$row->bank_name}}</td>
    <td>{{$row->account_number}}</td>
    <td>{{$row->phone}}</td>
    <td>No Testimony Yet</td>
    <td><button value="{{$row->id}}" type="button" class="btn btn-primary test" data-toggle="modal" data-target=".bs-example-modal-lg">Unlock User</button></td>
</tr>

@endforeach