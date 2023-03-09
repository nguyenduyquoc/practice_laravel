<!DOCTYPE html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>List Books</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="container">
    <div class="title">
        <h2 style="text-align: center">List books</h2>
    </div>
    <div class="card-tools">
        <form action="{{url("/listbooks")}}" method="get">
            <div class="input-group input-group-sm" style="width: 500px;">
                <input style="margin-right: 10px" type="text" value="{{app("request")->input("search")}}" name="search" class="form-control float-right" placeholder="Search">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="width: 10px">Id</th>
                <th>Title</th>
                <th>ISBN</th>
                <th>publish_year</th>
                <th>Available</th>
                <th>Author</th>
                <th>Action</th>
                <th>Action2</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title}}</td>
                    <td>{{ $item->ISBN }}</td>
                    <td><span class="badge bg-danger">{{ $item->pub_year }}</span></td>
                    <td>{{ $item->available }}</td>
                    <td>{{ $item->Author->name }}
                    </td>
                    <td>
{{--                        <a class="btn btn-primary" style="background-color: #721c24; color: white" href="{{route("product_edit", ["product"=>$item->id])}}">Edit</a>--}}
                    </td>
                    <td>
                        <form method="post" action="{{route("book_delete", ["book"=>$item->id])}}">
                            @method("DELETE")
                            @csrf
                            <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa không!')"
                                    class="btn btn-outline-warning">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer clearfix">
        {!! $data->appends(app("request")->input())->links("pagination::bootstrap-4") !!}
{{--                    {!! $data->links("pagination::bootstrap-4") !!}--}}
    </div>
</div>
</body>
</html>
