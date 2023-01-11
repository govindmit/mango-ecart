@extends('adminlayout')
@section('container')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    {{ Breadcrumbs::render('addproduct') }}
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1>addproduct</h1>
            <a href="{{ url('/admin/producttable') }}">
                <button type="button" class="btn btn-success">Back To Product Table</button>
            </a>
            <form action="/createproduct" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="control-label mb-1">Product Name</label>
                    <input id="name" value="" name="name" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="price" class="control-label mb-1">Product Price</label>
                    <input id="price" value="" name="price" type="text" class="form-control" required>
                </div>
                {{-- <div class="form-group">
                    <label for="category" class="control-label mb-1">Product Category</label>
                    <input id="category" value="" name="category" type="text" class="form-control" required>
                </div> --}}
                <div class="form-group">
                    <label for="image" class="control-label mb-1">Product Image</label>
                    <input id="image" value="" name="image" type="file" class="form-control" required>

                </div>
                <div class="form-group">
                    <label for="discription" class="control-label mb-1">Product Discription</label>
                    <input id="discription" value="" name="discription" type="text" class="form-control" required>

                </div>
                <div>
                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                        submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
@endsection