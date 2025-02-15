<!DOCTYPE html>
<html>

<head>
    <title>Navbar Menü</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu .dropdown-menu {
            top: 0px;
            left: 100%;
            margin-top: 5px;
            display: none;
            position: absolute;
        }

        .dropdown-submenu:hover .dropdown-menu {
            display: block;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    @foreach ($menuler as $menu)
                        @if ($menu->altMenuler->count() > 0)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ $menu->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    @foreach ($menu->altMenuler as $altMenu)
                                        @if ($altMenu->altMenuler->count() > 0)
                                            <li class="dropdown-submenu">
                                                <a class="dropdown-item dropdown-toggle"
                                                    href="#">{{ $altMenu->name }}</a>
                                                <ul class="dropdown-menu">
                                                    @include('alt_menuler_navbar', [
                                                        'menuler' => $altMenu->altMenuler,
                                                    ])
                                                </ul>
                                            </li>
                                        @else
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ $altMenu->url }}">{{ $altMenu->name }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ $menu->url }}">{{ $menu->name }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
