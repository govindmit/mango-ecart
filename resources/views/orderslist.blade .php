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

    <!-- {{ Breadcrumbs::render('orderslist') }} -->
    {{ session('message') }}

    <h1 style="margin-top: 50px; text-align: center;">order List</h1>

    <table class="table" style="margin-top: 20px;">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $list)
            <tr>
                <td>{{ $list->id }}</td>
                <td>{{ $list->product_id }}</td>
                <td>{{ $list->user_id }}</td>
                <td>
                    <a href="edituser/{{ $list->id }}"><button type="button" class="btn btn-btn btn-primary">Edit</button></a>
                    <a href="user/delete/{{ $list->id }}"><button type="button" class="btn btn-danger">Delete</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $data->withQueryString()->links('pagination::bootstrap-5') !!}
</body>

</html>
@endsection