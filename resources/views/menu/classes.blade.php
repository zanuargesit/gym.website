<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style3.css') }}">
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="col-4">
                <li>
                    GYMKITA
                </li>
            </div>
            <div class="col-4" id="menu">
                <li>Classes</li>
                <li>Product</li>
                <li>Feedback</li>
                <li>Member</li>
            </div>
            <col-4>
                <div class="profile">
                    <span>Dicky Arya</span>
                    <img src="{{ asset('img/gym.jpg') }}" alt="" width="40rem" height="40rem">
                </div>
            </col-4>
        </div>
        <div class="classes">
            <div class="col-6">
                <div class="head-1">
                    <h2>Classes</h2>
                    <button class="btn btn-primary">Filters</button>
                </div>
                <div class="kategori">
                    <button>All</button>
                    <button>Today</button>
                    <button>Tomorrow</button>
                    <button>This Week</button>
                    <button>This Weekend</button>
                </div>
            </div>
            <div class="col-6">
                <div class="head-2">
                    <h2>Join Classes</h2>
                    <div class="profile">
                        <span>Dicky Arya</span>
                        <img src="{{ asset('img/gym.jpg') }}" alt="" width="40rem" height="40rem">
                    </div>
                </div>

                <div class="sub-title">
                    <h2>Kelas yang kamu pilih</h2>
                </div>
            </div>


        </div>
        <div class="footer">
            <footer
                class="text-center text-lg-start text-black ">
                <!-- Grid container -->
                <div class="container p-4 pb-0">
                    <!-- Section: Links -->
                    <section class="">
                        <!--Grid row-->
                        <div class="row">
                            <!-- Grid column -->
                            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                                <h6 class="text-uppercase mb-4 font-weight-bold">
                                    Company name
                                </h6>
                                <p>
                                    Here you can use rows and columns to organize your footer
                                    content. Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit.
                                </p>
                            </div>
                            <!-- Grid column -->

                            <hr class="w-100 clearfix d-md-none" />

                            <!-- Grid column -->
                            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                                <h6 class="text-uppercase mb-4 font-weight-bold">Products</h6>
                                <p>
                                    <a class="text-black">MDBootstrap</a>
                                </p>
                                <p>
                                    <a class="text-black">MDWordPress</a>
                                </p>
                                <p>
                                    <a class="text-black">BrandFlow</a>
                                </p>
                                <p>
                                    <a class="text-black">Bootstrap Angular</a>
                                </p>
                            </div>
                            <!-- Grid column -->

                            <hr class="w-100 clearfix d-md-none" />

                            <!-- Grid column -->
                            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                                <h6 class="text-uppercase mb-4 font-weight-bold">
                                    Useful links
                                </h6>
                                <p>
                                    <a class="text-black">Your Account</a>
                                </p>
                                <p>
                                    <a class="text-black">Become an Affiliate</a>
                                </p>
                                <p>
                                    <a class="text-black">Shipping Rates</a>
                                </p>
                                <p>
                                    <a class="text-black">Help</a>
                                </p>
                            </div>

                            <!-- Grid column -->
                            <hr class="w-100 clearfix d-md-none" />

                            <!-- Grid column -->
                            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                                <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                                <p><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
                                <p><i class="fas fa-envelope mr-3"></i> info@gmail.com</p>
                                <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                                <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
                            </div>
                            <!-- Grid column -->
                        </div>
                        <!--Grid row-->
                    </section>
                    <!-- Section: Links -->

                    <hr class="my-3">

                    <!-- Section: Copyright -->
                    <section class="p-3 pt-0">
                        <div class="row d-flex align-items-center">
                            <!-- Grid column -->
                            <div class="col-md-7 col-lg-8 text-center text-md-start">
                                <!-- Copyright -->
                                <div class="p-3">
                                    © 2020 Copyright:
                                    <a class="text-black" href="https://mdbootstrap.com/">MDBootstrap.com</a>
                                </div>
                                <!-- Copyright -->
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end">
                                <!-- Facebook -->
                                <a
                                    class="btn btn-outline-light btn-floating m-1"
                                    class="text-black"
                                    role="button"><i class="fab fa-facebook-f"></i></a>

                                <!-- Twitter -->
                                <a
                                    class="btn btn-outline-light btn-floating m-1"
                                    class="text-black"
                                    role="button"><i class="fab fa-twitter"></i></a>

                                <!-- Google -->
                                <a
                                    class="btn btn-outline-light btn-floating m-1"
                                    class="text-black"
                                    role="button"><i class="fab fa-google"></i></a>

                                <!-- Instagram -->
                                <a
                                    class="btn btn-outline-light btn-floating m-1"
                                    class="text-black"
                                    role="button"><i class="fab fa-instagram"></i></a>
                            </div>
                            <!-- Grid column -->
                        </div>
                    </section>
                    <!-- Section: Copyright -->
                </div>
                <!-- Grid container -->
            </footer>
        </div>

    </div>
    </div>
</body>

</html>