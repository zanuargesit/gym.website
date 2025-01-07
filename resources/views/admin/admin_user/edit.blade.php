<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style5.css') }}">
</head>

<body>

    <div class="container">
        <div class="profil">
            <button class="btn btn-primary">Profile</button>
            <h5><a href="">Upload Photo</a></h5>
        </div>
        <form action="{{ route('admin.username.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form">
                <div class="row">
                    <div class="col-6">
                        <div class="input">
                            <h5>Username</h5>
                            <input class="form-control" type="text" name="username" value="{{ old('username', $user->username) }}" placeholder="Enter your username" required>
                            @error('username')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input">
                            <h5>Email</h5>
                            <input class="form-control" type="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Enter your email" required>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input">
                            <h5>Status</h5>
                            <select class="form-select" name="status" required>
                                <option value="active" {{ old('status', $user->status) == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status', $user->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6 kolom2">
                        <div class="input">
                            <h5>Role</h5>
                            <select class="form-select" name="role" required>
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                                <option value="trainer" {{ old('role', $user->role) == 'trainer' ? 'selected' : '' }}>Trainer</option>
                            </select>
                            @error('role')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input">
                            <h5>Phone Number</h5>
                            <input class="form-control" type="text" name="no_telepon" value="{{ old('no_telepon', $user->no_telepon) }}" placeholder="Enter your phone number">
                            @error('no_telepon')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer">
                <button class="btn btn-primary">Edit Now</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN6jIeHz" crossorigin="anonymous"></script>

</body>

</html>
