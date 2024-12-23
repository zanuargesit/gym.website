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
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="header">
                    <span>GYMKITA</span>
                </div>
                <div class="main">
                    <div class="title">
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
                    <div class="form">
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="row-1">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" required>
                                        @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="no_telepon" class="form-label">Nomor Telepon</label>
                                        <input type="text" name="no_telepon" class="form-control" value="{{ old('no_telepon') }}" required>
                                        @error('no_telepon')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                                        <input type="text" name="email" class="form-control" value="{{ old('email') }}" required>
                                        @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="cofirmed_password" class="form-label">Confirmed Password</label>
                                        <input type="password" id="confirmed_password" name="confirmed_password" class="form-control" required>
                                        <div id="password-error" class="text-danger" style="display: none;">Passwords do not match!</div>
                                        @error('confirmed_password')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="submit">
                                    <button type="submit" class="btn btn-primary"><a href="{{ route('login') }}" class="text-white" style="text-decoration: none">Login</a></button>
                                    <button type="submit" class="btn btn-primary">Daftar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="have_account">
                        <div class="line">
                            <hr>
                            <span> or</span>
                            <hr>
                        </div>
                        <div class="log">
                            <div class="d-flex align-items-left login">
                                <img src="{{ asset('img/facebook.png') }}" alt="Facebook" width="40" height="40" class="me-2">
                                <button class="btn">LOGIN WITH FACEBOOK</button>
                            </div>
                            <div class="d-flex align-items-left mt-2 login">
                                <img src="{{ asset('img/twitter.png') }}" alt="Twitter" width="40" height="40" class="me-2">
                                <button class="btn">LOGIN WITH TWITTER</button>
                            </div>
                            <div class="d-flex align-items-left mt-2 login">
                                <img src="{{ asset('img/google.png') }}" alt="Google" width="40" height="40" class="me-2">
                                <button class="btn">LOGIN WITH GOOGLE</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6  d-flex justify-content-center align-items-center gym">
                <img src="{{ asset('img/gym.jpg') }}" alt="Gym" class="img-fluid">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>