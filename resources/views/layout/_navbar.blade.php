<nav class="custom-navbar">
    <div class="navbar-brand">
        GYMKITA
    </div>
    <div class="navbar-menu">
        <ul>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('dashboard')}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('indexUserClasses') }}">Classes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('indexUserProduct')}}">Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('feedback')}}">Feedback</a>
            </li>
            @auth
            @php
            // Retrieve the user's membership status
            $membership = Auth::user()->membership;
            @endphp

            @if($membership)
            <!-- Show the appropriate badge based on membership status -->
            @switch($membership->status)
            @case('gold')
            <li class="nav-item">
                <span class="badge bg-warning text-dark p-3">Gold</span>
            </li>
            @break
            @case('silver')
            <li class="nav-item">
                <span class="badge bg-secondary p-3">Silver</span>
            </li>
            @break
            @default
            <!-- Default fallback, should not happen with valid data -->
            <li class="nav-item">
                <span class="badge bg-light">Unknown Status</span>
            </li>
            @endswitch
            @else
            <!-- If the user doesn't have a membership, show the Upgrade button -->
            <li class="nav-item">
                <button class="btn btn-warning">
                    <a style="text-decoration: none;" class="nav-link" href="{{ route('membership.selectPackage') }}">Upgrade</a>
                </button>
            </li>
            @endif
            @endauth

            <!-- <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Product</a>
                </li> -->
        </ul>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        @guest
        <button class="btn btn-primary">
            <a class="text-white" style="text-decoration: none" href="{{ route('login') }}">Login</a>
        </button>
        @endguest
        @auth
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('profile.edit', Auth::user()->id)}}">Profil</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
                </li>
            </ul>
        </div>
        @endauth
    </div>
</nav>