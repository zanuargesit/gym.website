<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
                        <h2>LOGIN</h2>
                    </div>
                    <div class="form">
                        <form action="/login" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="submit">
                                <button type="submit" class="btn btn-primary">Daftar</button>
                                <button type="submit" class="btn btn-primary">Login</button>
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
                            <div class="d-flex align-items-center login">
                                <img src="{{ asset('img/facebook.png') }}" alt="Facebook" width="40" height="40" class="me-2">
                                <button class="btn">LOGIN WITH FACEBOOK</button>
                            </div>
                            <div class="d-flex align-items-center mt-2 login">
                                <img src="{{ asset('img/twitter.png') }}" alt="Twitter" width="40" height="40" class="me-2">
                                <button class="btn">LOGIN WITH TWITTER</button>
                            </div>
                            <div class="d-flex align-items-center mt-2 login">
                                <img src="{{ asset('img/google.png') }}" alt="Google" width="40" height="40" class="me-2">
                                <button class="btn">LOGIN WITH GOOGLE</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 d-flex justify-content-center align-items-center gym">
                <img src="{{ asset('img/gym.jpg') }}" alt="Gym" class="img-fluid" style="border-radius: 1rem;">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>