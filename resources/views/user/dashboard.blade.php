@extends('layout.master')

@section('style')
<link rel="stylesheet" href="{{ asset('css/style2.css') }}">
@endsection

@section('content')
@if (session('successLogin'))
<div class="alert alert-success">
    {{ session('successLogin') }}
</div>
@endif
@if (session('successRegister'))
<div class="alert alert-success">
    {{ session('successRegister') }}
</div>
@endif
@if (session('successLogout'))
<div class="alert alert-danger">
    {{ session('successLogout') }}
</div>
@endif
<div class="welcome">
    <h1>Welcome to GYMKITA</h1>
    <h6>Here, you can easily manage your account and stay updated</h6>
    <button class="btn btn-primary">Get Started</button>
</div>
<div class="sub-title">
    <h2>Explore Our Services Designed Just for You:</h2>
</div>
<div class="service">
    <div class="row">
        <div class="col-3">
            <div class="card" style="width: 26rem; height: 20rem; text-align: center">
                <img src="{{ asset('img/1.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card" style="width: 26rem; height: 20rem; text-align: center">
                <img src="{{ asset('img/1.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card" style="width: 26rem; height: 20rem; text-align: center">
                <img src="{{ asset('img/1.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card" style="width: 26rem; height: 20rem; text-align: center">
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
<div class="sub-title">
    <h2>Instructors</h2>
</div>
<div class="service">
    <div class="row ">
        <div class="col-3">
            <div class="card" style="width: 24rem; height: 36rem; text-align: center">
                <img src="{{ asset('img/1.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card" style="width: 24rem; height: 36rem; text-align: center">
                <img src="{{ asset('img/1.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card" style="width: 24rem; height: 36rem; text-align: center">
                <img src="{{ asset('img/1.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card" style="width: 24rem; height: 36rem; text-align: center">
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
<div class="sub-title">
    <h2>Explore the classes available for you to join:</h2>
</div>
<div class="classes">
    <div class="row">
        <div class="col-4">
            <div class="card" style="width: 24rem; height: 20rem; text-align: center">
                <img src="{{ asset('img/1.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card" style="width: 24rem; height: 20rem; text-align: center">
                <img src="{{ asset('img/1.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card" style="width: 24rem; height: 20rem; text-align: center">
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
<div class="sub-title">
    <h2>Gym Store Products</h2>
</div>
<div class="store">
    <div class="row">
        <div class="col-2">
            <div class="card" style=" text-align: center">
                <img src="{{ asset('img/1.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card" style=" text-align: center">
                <img src="{{ asset('img/1.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card" style=" text-align: center">
                <img src="{{ asset('img/1.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card" style=" text-align: center">
                <img src="{{ asset('img/1.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card" style=" text-align: center">
                <img src="{{ asset('img/1.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="sub-title">
            <button>Billed Montly</button>
            <button>Billed Yearly</button>
        </div>
        <div class="store">
            <div class="row">
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
        <div class="sub-title">
            <h2>Client’s Feedback</h2>
        </div>
        <div class="store">
            <div class="row">
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
                <div class="footer">
                    <div class="row">
                        <div class="col-6">
                            <h2>follow us</h2>
                            <div class="icon">
                                <li>facebook</li>
                                <li>twitter</li>
                                <li>instagram</li>
                                <li>Telegram</li>
                            </div>
                        </div>
                        <div class="col-6">
                            <h2>kirim pertanyaan</h2>
                            <div class="input">
                                <input type="text" placeholder="masukkan email">
                                <button>kirim</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <li>about us</li>
                        <li>contact us</li>
                        <li>Terms & Conditions</li>
                        <li>Privacy Policy</li>
                        <li>Follow Us</li>
                    </div>
                    <div class="row">
                        <h2><i>© 2021 All Rights Reserved</i></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection