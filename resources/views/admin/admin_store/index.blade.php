<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Dashboard</title>
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
                    <li><a href="{{ route('admin.classes.index') }}" class="btn btn-outline-secondary">Classes</a></li>
                    <li><a href="{{ route('admin.joinclasses.index') }}" class="btn btn-outline-secondary">Join Classes</a></li>
                    <li><a href="{{ route('admin.store.index') }}" class="btn btn-secondary">Products</a></li>
                </div>>
                <div class="create">
                    <a href="{{ route('admin.store.create') }}" class="btn btn-primary">Add Product</a>
                </div>
            </div>

            <div class="col-md-9 right">
                <div class="header d-flex justify-content-between align-items-center">
                    <div class="head">
                        <h2>Products</h2>
                    </div>
                    <div class="search">
                        <form action="{{ route('admin.store.index') }}" method="GET">
                            <input class="form-control" type="search" name="search" placeholder="Search Product" aria-label="Search" value="{{ request('search') }}">
                        </form>
                    </div>
                </div>
                <div class="product-list mt-4">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stores as $store)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $store->name_product }}</td>
                                    <td>{{ $store->deskripsi }}</td>
                                    <td>{{ $store->harga }}</td>
                                    <td>{{ $store->stock }}</td>
                                    <td>
                                        <a href="{{ route('admin.store.edit', $store->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('admin.store.destroy', $store->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $stores->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
