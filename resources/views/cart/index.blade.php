@extends('layout.master')

@section('content')
<body>
    <div class="container my-5">
        <h2>Your Shopping Cart</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                @if(session('file'))
                    <!-- Link untuk mendownload laporan pembelian -->
                    <a href="{{ route('cart.downloadReport', session('file')) }}" class="btn btn-info mt-2">Download Your Purchase Report</a>
                @endif
            </div>
        @endif

        @if(!empty($cartItems) && count($cartItems) > 0)
            <div class="row">
                @foreach($cartItems as $id => $item)
                    <div class="col-md-3 mb-4">
                        <div class="card h-100 text-center">
                            <img src="{{ asset('img/' . $item['product']->image) }}" class="card-img-top" alt="{{ $item['product']->name_product }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item['product']->name_product }}</h5>
                                <p class="card-text">{{ $item['product']->deskripsi }}</p>
                                <p class="card-text">Rp {{ number_format($item['product']->harga, 0, ',', '.') }}</p>
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Remove from Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Button Checkout -->
            <form action="{{ route('cart.checkout') }}" method="POST">
                @csrf
                <div class="mt-3">
                    <label for="address">Shipping Address</label>
                    <input type="text" id="address" name="address" class="form-control" required placeholder="Enter your address">
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-success">Checkout</button>
                </div>
            </form>
        @else
            <p>Your cart is empty!</p>
        @endif
    </div>
</body>
@endsection
