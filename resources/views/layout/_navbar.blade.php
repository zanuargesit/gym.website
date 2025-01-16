<nav class="custom-navbar">
    <div class="navbar-brand">
        GYMKITA
    </div>
    <div class="navbar-menu">
        <ul>
            <li><a href="{{route('dashboard')}}" class="active">Home</a></li>
            <li><a href="{{ route('indexUserClasses') }}">Classes</a></li>
            <li><a href="{{route('indexUserProduct')}}">Product</a></li>
            <li><a href="{{route('feedback')}}">Feedback</a></li>
            <li><a href="#">Member</a></li>
        </ul>
    </div>
    <div class="user-section">
        @guest
        <a href="{{ route('login') }}" class="btn-login">Login</a>
        @endguest
        @auth
        <div class="user-dropdown">
            <span>{{ Auth::user()->name }}</span>
            <ul>
                <li><a href="{{route('profile.edit', Auth::user()->id)}}">Profil</a></li>
                <li>
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
