@extends('layout.master')

@section('style')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container mt-5">
    <h2>Leave a Comment</h2>
    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="form-control" rows="4" placeholder="Write your comment here..." required></textarea>
            @error('content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit Comment</button>
    </form>

    <h3 class="mt-5">Comments</h3>
    <div class="comments-list">
        @forelse($comments as $comment)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $comment->user->name }}</h5>
                    <p class="card-text">{{ $comment->content }}</p>
                    <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                </div>
            </div>
        @empty
            <p>No comments yet. Be the first to comment!</p>
        @endforelse
    </div>
</div>
@endsection

@section('footer')
<div class="footer">
    <footer class="text-center text-lg-start text-black">
        <div class="container p-4 pb-0">
            <section>
                <div class="row">
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Company name</h6>
                        <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Products</h6>
                        <p><a class="text-black">MDBootstrap</a></p>
                        <p><a class="text-black">MDWordPress</a></p>
                        <p><a class="text-black">BrandFlow</a></p>
                        <p><a class="text-black">Bootstrap Angular</a></p>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Useful links</h6>
                        <p><a class="text-black">Your Account</a></p>
                        <p><a class="text-black">Become an Affiliate</a></p>
                        <p><a class="text-black">Shipping Rates</a></p>
                        <p><a class="text-black">Help</a></p>
                    </div>
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                        <p><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
                        <p><i class="fas fa-envelope mr-3"></i> info@gmail.com</p>
                        <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                        <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
                    </div>
                </div>
            </section>
            <hr class="my-3">
            <section class="p-3 pt-0">
                <div class="row d-flex align-items-center">
                    <div class="col-md-7 col-lg-8 text-center text-md-start">
                        <div class="p-3">© 2020 Copyright:
                            <a class="text-black" href="https://mdbootstrap.com/">MDBootstrap.com</a>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end">
                        <a class="btn btn-outline-light btn-floating m-1" role="button"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-floating m-1" role="button"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-floating m-1" role="button"><i class="fab fa-google"></i></a>
                        <a class="btn btn-outline-light btn-floating m-1" role="button"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </section>
        </div>
    </footer>
</div>
@endsection
