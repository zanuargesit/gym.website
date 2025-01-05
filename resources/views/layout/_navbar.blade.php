<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">GYMKITA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
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
                    <a class="nav-link" href="#">Feedback</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Member</a>
                </li>

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
                        <button type="submit" style="text-decoration: none; color: red" class="btn btn-link">Logout</button>
                    </form>
                    </li>
                </ul>
            </div>
            @endauth
        </div>
    </div>
</nav>