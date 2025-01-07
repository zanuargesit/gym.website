<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
</head>

<body>
    <div class="container">
        
        <div class="left-column">
            <h2>GYMKITA</h2>
            <p>Join our community and achieve your fitness goals with us!</p>
        </div>

       
        <div class="right-column">
            <div class="header text-center">
                <h2>REGISTER</h2>
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
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input class="form-control" type="text" name="username" placeholder="Masukkan Username"
                                value="{{ old('username') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input class="form-control" type="text" name="name" placeholder="Masukkan nama"
                                value="{{ old('name') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control" type="email" name="email" placeholder="Masukkan email"
                                value="{{ old('email') }}" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input class="form-control" type="password" name="password" placeholder="Masukkan password" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirmed_password" class="form-label">Confirm Password</label>
                            <input type="password" name="confirmed_password" class="form-control"
                                placeholder="konfirmasi password" required>
                        </div>
                        <div class="mb-3">
                            <label for="no_telepon" class="form-label">Phone Number</label>
                            <input class="form-control" type="text" name="no_telepon" placeholder="Masukkan Nomor Telepon"
                                value="{{ old('no_telepon') }}">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
