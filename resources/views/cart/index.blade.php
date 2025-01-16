@extends('layout.master')

@section('style')
<link rel="stylesheet" href="{{ asset('css/style3.css') }}">
@endsection

@section('content')
<body>


    <div class="container mt-5">
        <h2>Your Cart</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp

                @foreach ($cartItems as $item)
                    <tr>
                        <td>{{ $item['product']->name_product }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>Rp {{ number_format($item['product']->harga * $item['quantity'], 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $item['product']->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @php
                        $total += $item['product']->harga * $item['quantity'];
                    @endphp
                @endforeach
            </tbody>
        </table>

        <h3>Total: Rp {{ number_format($total, 0, ',', '.') }}</h3>

        <form action="{{ route('cart.checkout') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="password" class="form-label">Account Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Checkout</button>
        </form>

        @if(session('file'))
    <a href="{{ route('cart.downloadReport', session('file')) }}" class="btn btn-success mt-3">Download Purchase Report</a>
@endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function printPage() {
            window.print();
        }
    </script>
</body>
</html>
@endsection