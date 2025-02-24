<tr>
    <td><strong>Name:</strong></td>
    <td>{{ $data->name }}</td>
</tr>
<tr>
    <td><strong>Phone Number:</strong></td>
    <td>{{ $data->phone_number }}</td>
</tr>
<tr>
    <td><strong>Pincode:</strong></td>
    <td>{{ $data->pincode }}</td>
</tr>
<tr>
    <td><strong>City:</strong></td>
    <td>{{ $data->city }}</td>
</tr>

<tr>
    <td><strong>State:</strong></td>
    <td> {{ $data->state }} </td>
</tr>

<tr>
    <td><strong>Address:</strong></td>
    <td>{{ $data->address }}</td>
</tr>

<tr>
    <td><strong>Locality:</strong></td>
    <td>{{ $data->locality }}</td>
</tr>

<tr>
    <td><strong>Landmark:</strong></td>
    <td>{{ $data->landmark }}</td>
</tr>
<tr>
    <td><strong>Delivery Preference:</strong></td>
    <td>{{$data->deliveryPreference->name ?? null}}</td>
</tr>
<tr>
    <td><strong>Delivery Preference Time:</strong></td>
    <td>{{$data->deliveryPreference->time ?? null}}</td>
</tr>