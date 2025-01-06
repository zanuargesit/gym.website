<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style5.css') }}">
</head>

<body>
    <div class="container">
        <div class="profil">
            <button class="btn btn-primary">Profil</button>
            <h5><a href="">Upload Photo</a></h5>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('admin.username.store') }}" method="POST">
            @csrf
            <div class="form">
                <div class="row">
                    <div class="col-6">
                        <div class="input">
                            <h5>Username</h5>
                            <input class="form-control" type="text" name="username" placeholder="Enter username"
                                value="{{ old('username') }}" required>
                        </div>
                        <div class="input">
                            <h5>Name</h5>
                            <input class="form-control" type="text" name="name" placeholder="Enter name" value="{{ old('name') }}" required>
                        </div>

                        <div class="input">
                            <h5>Email</h5>
                            <input class="form-control" type="email" name="email" placeholder="Enter email"
                                value="{{ old('email') }}" required>
                        </div>
                        <div class="input">
                            <h5>Password</h5>
                            <input class="form-control" type="password" name="password" placeholder="Enter password"
                                required>
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="input">
                            <h5>Role</h5>
                            <select class="form-select" name="role" required>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                                <option value="trainer" {{ old('role') == 'trainer' ? 'selected' : '' }}>Trainer</option>
                            </select>
                        </div>
                        <div class="input">
                            <h5>Status</h5>
                            <select class="form-select" name="status" required>
                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        <div class="input">
                            <h5>Phone Number</h5>
                            <input class="form-control" type="text" name="no_telepon" placeholder="Enter phone number"
                                value="{{ old('no_telepon') }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>