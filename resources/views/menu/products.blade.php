
@extends('layout.master')

@section('style')
<link rel="stylesheet" href="{{ asset('css/style4.css') }}">
@endsection

@section('content')
<body>
   
                <div class="kategori">
                    <button>All</button>
                    <button>Supplements</button>
                    <button>Apparel</button>
                    <button>Equipment </button>
                    <button>Accessories</button>
                    <button>Sale</button>
                </div>
                <div class="row store">

                    <div class="col-3">
                        <div class="card" style=" text-align: center">
                            <img src="{{ asset('img/1.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style=" text-align: center">
                            <img src="{{ asset('img/1.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style=" text-align: center">
                            <img src="{{ asset('img/1.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style=" text-align: center">
                            <img src="{{ asset('img/1.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="card" style=" text-align: center">
                            <img src="{{ asset('img/1.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style=" text-align: center">
                            <img src="{{ asset('img/1.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style=" text-align: center">
                            <img src="{{ asset('img/1.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style=" text-align: center">
                            <img src="{{ asset('img/1.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="col-6">
                <div class="head-2">
                    <h2>Your items</h2>
                    <div class="profile">
                        <span>Dicky Arya</span>
                        <img src="{{ asset('img/gym.jpg') }}" alt="" width="40rem" height="40rem">
                    </div>
                </div>

                <div class="sub-title">
                    <h5>Card</h5>
                    <h6>You have 3 item in your cart</h6>
                </div>
                <div class="row justify-content-between align-items-center item">
                    <div class="col-2 ">
                        <img
                            src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img6.webp"
                            class="img-fluid rounded-3" alt="Cotton T-shirt">
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                        <h6 class="text-muted">Shirt</h6>
                        <h6 class="mb-0">Cotton T-shirt</h6>
                    </div>
                    <div class="co-3 col-lg-3 col-xl-2 d-flex">
                        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                            <i class="fas fa-minus"></i>
                        </button>

                        <input id="form1" min="0" name="quantity" value="1" type="number"
                            class="form-control form-control-sm" />

                        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                        <h6 class="mb-0">€ 44.00</h6>
                    </div>
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                        <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                    </div>
                </div>
                <div class="form">
                    <span>Alamat</span>

                    <input class ="form-control" type="alamat" name="" id="">
                </div>
                <div class="bayar text-center">
                    <div class="head g-2">

                        <h3>Card Details</h3>
                        <h5>Card type</h5>
                        <li>
                            <button class="btn btn-primary">BRI</button>
                            <button class="btn btn-primary">BCA</button>
                            <button class="btn btn-primary">QRIS</button>
                            <button class="btn btn-primary">See All</button>
                            </li>
                            <h5>Scan QRIS</h5>
                    </div>
                        <img src="{{ asset('img/qr.jpg') }}" alt="">
                        <hr>
                        <div class="total text-start">
                            <h6>Subtotal</h6>
                            <h6>pajak</h6>
                            <h6>Total (Tax incl.)</h6>
                        </div>
                        <button class="btn btn-primary">
                            Checkout
                        </button>
                </div>

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
                    <div class="row-1 info">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3 ">
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
                    <div class="row-2 d-flex align-items-center">
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

</html>@endsection
