<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/adminaccount.css') }}?v=1">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 left">
                <div class="sub-title">
                    <h4>Manage</h4>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
                <br><br>
                <div class="menu">
                    <li><a href="{{ route('admin.username.index') }}" class="btn btn-outline-secondary">Users</a></li>
                    <li><a href="{{ route('admin.classes.index') }}" class="btn btn-secondary">Classes</a></li>
                    <li><a href="{{ route('admin.store.index') }}" class="btn btn-outline-secondary">Products</a></li>
                    <li><a href="{{ route('comments.index') }}" class="btn btn btn-outline-secondary">Comments</a></li>

                </div>
                <div class="create">
                    <a href="{{ route('admin.classes.create') }}" class="btn btn-primary">Add Product</a>
                </div>
            </div>

            <div class="col-6 right">
                <div class="header">
                    <div class="head">
                        <h2>Products</h2>
                    </div>
                    <div class="search">
                        <form action="{{ route('admin.classes.index') }}" method="GET">
                            <input class="form-control" type="search" name="search" placeholder="Search Class" aria-label="Search" value="{{ request('search') }}">
                        </form>
                    </div>
                </div>
                <div class="product-list mt-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Class Name</th>
                                <th>Description</th>
                                <th>Trainer</th>
                                <th>Start time</th>
                                <th>End time</th>
                                <th>Capacity</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classes as $class)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $class->name_class }}</td>
                                <td>{{ $class->description }}</td>
                                <td>{{ $class->trainer->username ?? 'N/A' }}</td>
                                <td>{{ $class->start_time }}</td>
                                <td>{{ $class->end_time }}</td>
                                <td>{{ $class->capacity }}</td>
                                <td>
                                    <a href="{{ route('admin.classes.edit', $class->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.classes.destroy', $class->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    {{ $classes->links() }}
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>