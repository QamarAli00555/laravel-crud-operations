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
    @if($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <strong>{{$message}}</strong>
    </div>
    @endif

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-4">
          <div class="card mt-3 p-3 ">
            <form action="/products/update/{{$product->id}}" method="post" enctype="multipart/form-data" class="text-align-center">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{old('name',$product->name)}}" class="form-control">
                @if($errors->has('name'))
                <span class="text-danger">{{$errors->first('name')}}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description"  rows="4">{{old('description',$product->description)}}</textarea>
                @if($errors->has('description'))
                <span class="text-danger">{{$errors->first('description')}}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" value="{{$product->image}}"  value="{{old('image')}}"  class="form-control"> 
                @if($errors->has('image'))
                <span class="text-danger">{{$errors->first('image')}}</span>
                @endif
              </div>

              <button type="submit" class="btn btn-dark w-100">Submit</button>
          </form>
          </div>
        </div>
      </div>
    </div>
</body>
</html>