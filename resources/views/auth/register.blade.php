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



                                    </div>
                                    <div class="col-6">
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