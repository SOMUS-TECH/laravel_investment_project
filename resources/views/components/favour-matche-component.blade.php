@foreach($favour as  $row)

<tr>
    <td>{{$row->fullname}}</td>
    <td>{{$row->email}}</td>
    <td>{{$row->address}}</td>
    <td>{{$row->gender}}</td>
    <td>{{$row->dob}}</td>
    <td>{{$row->bank_name}}</td>
    <td>{{$row->account_number}}</td>
    <td>{{$row->phone}}</td>
    <td><button value="{{$row->id}}" type="button" class="btn btn-primary matchesfavour" data-toggle="modal" data-target=".bs-example-modal-lg">Matche User</button></td>
</tr>

@endforeach