<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- A grey horizontal navbar that becomes vertical on small screens -->
    <nav class="navbar navbar-expand-sm bg-dark">
        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-light" href="/">Products</a>
            </li>
        </ul>
    </nav>
    <div class="container">
        <div class="text-right">
            <a href="/products/create" class="btn btn-dark  mt-2">New Product</a>
        </div>
        
        <table class="table table-hover mt-5">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                    <tr style="justify-content: center">
                        <td >{{$loop->index+1}}</td>
                        <td >
                            <img src="products/{{$item->image}}" class="rounded-circle" width="50" height="50"  alt="image">
                        </td>
                        <td >{{$item->name}}</td>
                        <td >{{$item->description}}</td>

                        <td>
                            <a href="products/edit/{{$item->id}}" class="btn btn-info btn-sm">Edit</a>
                            <a href="products/delete/{{$item->id}}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>  
    </div>

</body>
</html>