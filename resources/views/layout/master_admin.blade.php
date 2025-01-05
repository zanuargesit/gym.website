<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin GYMKITA')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-
alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background: #000;
            color: #fff;
            padding-top: 20px;
            position: fixed;
            top: 0;

            left: 0;
            transition: width 0.3s;
        }

        .sidebar.collapsed {
            width: 0;
            overflow: hidden;
        }

        .sidebar .nav-link {
            color: #fff;
        }

        .sidebar .nav-link:hover {
            color: #ccc;
        }

        .content {
            margin-left: 250px;
            flex: 1;
            padding-top: 56px;
            /* Height of fixed navbar */
            transition: margin-left 0.3s;
        }

        .content.expanded {
            margin-left: 0;
        }

        .navbar {
            background-color: #000 !important;
        }

        .navbar .nav-link {
            color: #fff !important;
        }

        .navbar .nav-link:hover {
            color: #ccc !important;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <h4 class="text-center">Menu</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('manageuser.index') }}" class="nav-link">Data User</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Data Trainer</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Data Classes</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Data Membership</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Data Product</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Data Orders</a>
            </li>
        </ul>
    </div>
    <!-- Main Content -->
    <div id="content" class="content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container-fluid">
                <button id="toggle-sidebar" class="btn btn-outline-light me-3">
                    ☰
                </button>
                <a class="navbar-brand text-white" href="#">Admin GYMKITA</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-
                    bs-target="#navbarNav"

                    aria-controls="navbarNav" aria-expanded="false" aria-label="Togglenavigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/manageuser">Home</a>
                        </li>
                        <li class="nav-item">
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                </li>
                </ul>
            </div>
    </div>
    </nav>
    <!-- Content Section -->
    <div class="mt-4">
        @yield('content')

    </div>
    </div>
    <!-- Bootstrap JS dan Custom JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-
alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const toggleButton = document.getElementById('toggle-sidebar');
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');
        // Load sidebar state from localStorage
        const sidebarState = localStorage.getItem('sidebarState');
        if (sidebarState === 'collapsed') {
            sidebar.classList.add('collapsed');
            content.classList.add('expanded');
        }
        toggleButton.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            content.classList.toggle('expanded');
            // Save sidebar state to localStorage
            if (sidebar.classList.contains('collapsed')) {
                localStorage.setItem('sidebarState', 'collapsed');
            } else {
                localStorage.setItem('sidebarState', 'expanded');
            }
        });
    </script>
</body>

</html>