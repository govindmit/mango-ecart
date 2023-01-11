@extends('adminlayout');
@section('container')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Add Product</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>

    <body>
    {{ Breadcrumbs::render('edituser') }}
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1>Update User Information</h1>
                <a href="{{ url('/userslist') }}">
                    <button type="button" class="btn btn-success">Back</button>
                </a>
                <form action="/useredit" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name" class="control-label mb-1">User Name</label>
                        <input id="name" value="{{ $data->name }}" name="name" type="text" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label mb-1">User Email</label>
                        <input id="email" value="{{ $data->email }}" name="email" type="text" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="role" class="control-label mb-1">User Role</label>
                        <input id="role" value="{{ $data->role_id }}" name="role" type="text" class="form-control"
                            required>
                    </div>
                    <div>
                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                            Update
                        </button>
                        <input type="hidden" name="id" value="{{ $data->id }}">

                    </div>
                </form>
            </div>
        </div>
    </body>
    </html>
@endsection
