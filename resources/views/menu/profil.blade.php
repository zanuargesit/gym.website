<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/adminaccount.css') }}">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-6 left">
                <div class="head">

                    <div class="profile">
                        <span>Dicky Arya</span>
                        <img src="{{ asset('img/gym.jpg') }}" alt="" width="40rem" height="40rem">
                    </div>

                </div>
                <div class="menu">
                    <li><button class="btn btn-secondary ">Dashboard</button></li>
                    <li><button class="btn btn-outline-secondary">Members</button></li>
                    <li><button class="btn btn-outline-secondary">Classes</button></li>
                    <li><button class="btn btn-outline-secondary">Staff</button></li>
                    <li><button class="btn btn-outline-secondary">Inventory</button></li>
                </div>

            </div>
            <div class="col-6 right">
                <div class="sub-title">
                    <h4>Account Information</h4>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>