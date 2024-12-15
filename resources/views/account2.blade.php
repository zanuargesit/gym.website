<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style5.css') }}">
</head>

<body>

    <div class="container">
        <div class="profil">
            <button class="btn btn-primary">Profil</button>
            <h5><a href="">Upload Photo</a></h5>
        </div>
        <div class="form">
            <div class="row">

                <div class="col-6">
                    <div class="input">
                        <h5>Username</h5>
                        <input class="form-control" type="text" placeholder="Enter your first name">
                    </div>
                    <div class="input">
                        <h5>Email</h5>
                        <input class="form-control" type="text" placeholder="Enter your email">
                    </div>
                    <div class="input">
                        <h5>Status</h5>
                        <select class="form-select" name="" id="">
                            <option value="">Active</option>
                            <option value="">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="col-6 kolom2">
                    <div class="input">
                        <h5>Peran</h5>
                        <select class="form-select" name="" id="">
                            <option value="">Trainer</option>
                            <option value="">Member</option>
                        </select>
                    </div>
                    <div class="input">
                        <h5>Phone Number</h5>
                        <input class="form-control" type="number" placeholder="Enter your phone number">
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <button class="btn btn-primary">Edit Now</button>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>