@extends('layout.master')

@section('style')
<link rel="stylesheet" href="{{ asset('css/style4.css') }}">
@endsection

@section('content')
<body>
    <div class="container my-5">
        <div class="row store">
            @foreach($products as $product)
                <div class="col-md-3 mb-4">
                    <div class="card h-100 text-center">
                        <img src="{{ asset('img/' . $product->image) }}" class="card-img-top" alt="{{ $product->name_product }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name_product }}</h5>
                            <p class="card-text">{{ $product->deskripsi }}</p>
                            <p class="card-text">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
@endsection
