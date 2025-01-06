<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Classes Dashboard</title>
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
                    <li><a href="{{ route('admin.joinclasses.index') }}" class="btn btn-secondary">Join Classes</a></li>
                    <li><a href="{{ route('admin.store.index') }}" class="btn btn-outline-secondary">Products</a></li>
                </div>
            </div>

            <div class="col-6 right">
                <div class="header">
                    <h2>Join Classes</h2>
                </div>
               
            
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Class</th>
                                <th>Booking Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($joinClasses as $joinClass)
                            <tr>
                                <td>{{ $joinClass->user->name }}</td>
                                <td>{{ $joinClass->class->name_class }}</td>
                                <td>{{ $joinClass->booking_date }}</td>
                                <td>{{ $joinClass->status }}</td>
                                <td>
                                    <form action="{{ route('admin.joinclasses.destroy', $joinClass->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $joinClasses->links() }}
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
