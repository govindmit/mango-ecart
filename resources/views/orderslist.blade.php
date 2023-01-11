@extends('adminlayout')
@section('container')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Table</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    {{ Breadcrumbs::render('orderslist') }}
    {{ session('message') }}

    <h1 style="margin-top: 50px; text-align: center;">Order List</h1>

    <table class="table" style="margin-top: 20px;">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Product Id</th>
                <th>User Id</th>
                <th>Address1</th>
                <th>Address2</th>
                <th>Country</th>
                <th>State</th>
                <th>Zip</th>
                <th>Phone</th>
                <th>Amount</th>
                <th>Paymnent Method</th>
                <th>Payment Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $list)
            <tr>
                <td style="text-align: center;">{{ $list->id }}</td>
                <td style="text-align: center;">{{ $list->product_id }}</td>
                <td style="text-align: center;">{{ $list->user_id }}</td>
                <td style="text-align: center;">{{ $list->address1 }}</td>
                <td style="text-align: center;">{{ $list->address2 }}</td>
                <td style="text-align: center;">{{ $list->country }}</td>
                <td style="text-align: center;">{{ $list->state }}</td>
                <td style="text-align: center;">{{ $list->zip }}</td>
                <td style="text-align: center;">{{ $list->phone }}</td>
                <td style="text-align: center;">{{ $list->amount }}</td>
                <td style="text-align: center;">{{ $list->payment_method }}</td>
                <td style="text-align: center;">{{ $list->payment_status }}</td>
                <td>
                    <a href="editorder/{{ $list->id }}"><button type="button" class="btn btn-btn btn-primary">View</button></a>
                    <!-- <a href="order/delete/{{ $list->id }}"><button type="button" class="btn btn-danger">Delete</button></a> -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $data->withQueryString()->links('pagination::bootstrap-5') !!}
</body>

</html>
@endsection