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
    <td><input type="checkbox" class="favours2" value="{{$row->id}}" /></td>
    <td><button value="{{$row->id}}"  class="btn btn-small btn-danger del">delete</button></td>
</tr>

@endforeach