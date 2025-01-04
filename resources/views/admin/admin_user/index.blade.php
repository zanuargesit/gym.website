<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/adminaccount.css') }}?v=1">
</head>
<body>
    <div class="container">
        <div class="row">
            <!-- Left Sidebar -->
            <div class="col-6 left">
                <div class="sub-title">
                    <h4>Manage</h4>
                </div>
                <div class="menu">
                    <li><button class="btn btn-secondary">Users</button></li>
                    <li><button class="btn btn-outline-secondary">Trainers</button></li>
                    <li><button class="btn btn-outline-secondary">Classes</button></li>
                    <li><button class="btn btn-outline-secondary">Memberships</button></li>
                    <li><button class="btn btn-outline-secondary">Products</button></li>
                    <li><button class="btn btn-outline-secondary">Orders</button></li>
                </div>
                <div class="create">
                    <a href="{{ route('admin.username.create') }}" class="btn btn-primary">Add User</a>
                </div>
            </div>

            <!-- Right Content -->
            <div class="col-6 right">
                <div class="header">
                    <div class="head">
                        <h2>Users</h2>
                    </div>
                    <div class="search">
                        <form action="{{ route('admin.username.index') }}" method="GET">
                            <input class="form-control" type="search" name="search" placeholder="Search User" aria-label="Search" value="{{ request('search') }}">
                        </form>
                    </div>
                </div>
                <div class="user-list mt-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->no_telepon }}</td>
                                    <td>{{ ucfirst($user->role) }}</td>
                                    <td>{{ ucfirst($user->status) }}</td>
                                    <td>
                                        <a href="{{ route('admin.username.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('admin.username.destroy', $user->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
