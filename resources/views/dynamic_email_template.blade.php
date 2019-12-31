{{-- <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }
    
    tr:nth-child(even) {
      background-color: #dddddd;
    }
    </style> --}}

<p>Dear {{ $data['name'] }} ,</p>
<p>Thank you for choosing our homestay </p>
<p>To complete your reservation, please pay at <b>Bank Islam (Account number: 12083020391510)</b> 4 days before  <b>{{$data['check_in']}}</b> and submit a payment receipt in Homestay website.</p>

<table>
    
    <tr>
        <th>Name</th>
        <td>{{$data['name']}}</td>
    </tr>
    <tr>
        <th>Check In</th>
        <td>{{$data['check_in']}}</td>
    </tr>
    <tr>
        <th>Check Out </th>
        <td>{{$data['check_out']}}</td>
    </tr>
    
    <tr>
        <th>Number of Guests </th>
        <td>{{$data['num_of_guests']}}</td>
    </tr>
    <tr>
        <th>Price</th>
        <td><b>{{$data['final_price']}}</b></td>
    </tr>

</table>

<p>Failure to make payment by deadline will lead to reservation cancellation.</p>
{{-- <p>You are required to  {{ $data['message'] }}.</p> --}}
<p>If you have any questions or comments, please visit our website or call 012-3796691.

    Thank you</p>
{{-- <p>It would be appriciative, if you gone through this feedback.</p> --}}