<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title')PMB Rosma</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="../css/dashboard/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="../css/dashboard/admin.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"
        integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw=="
        crossorigin="anonymous"></script>

    @yield('style')
</head>

<body>
    <!--Main Navigation-->
    <header>
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar bg-white">
            <div class="position-sticky">
                <div class="list-group list-group-flush mx-3 mt-4">
                    <a href="{{ route('home') }}"
                        class="list-group-item list-group-item-action py-2 {{ request()->routeIs('home') ? 'active' : '' }}"
                        data-mdb-ripple-init>
                        <i class="fa-solid fa-table-columns fa-fw me-3"></i><span>Dashboard</span>
                    </a>
                    <a href="{{ route('profile') }}"
                        class="list-group-item list-group-item-action py-2 {{ request()->routeIs('profile') ? 'active' : '' }}"
                        data-mdb-ripple-init aria-current="true">
                        <i class="fa-solid fa-address-card fa-fw me-3"></i><span>Data Diri</span>
                    </a>
                    <a href="{{ route('registration') }}"
                        class="list-group-item list-group-item-action py-2 {{ request()->routeIs('registration') ? 'active' : '' }}"
                        data-mdb-ripple-init>
                        <i class="fa-solid fa-check-double fa-fw me-3"></i><span>Daftar Ulang</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action py-2" data-mdb-ripple-init><i
                            class="fa-solid fa-puzzle-piece fa-fw me-3"></i><span>Test</span>
                    </a>
                </div>
            </div>
        </nav>
        <!-- Sidebar -->

        <!-- Navbar -->
        <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-collapse-init data-mdb-target="#sidebarMenu"
                    aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Brand -->
                <a class="navbar-brand" href="/">
                    <img src="storage/logo.png" height="35" alt="" loading="lazy" />
                </a>

                <!-- Right links -->
                <ul class="navbar-nav ms-auto d-flex flex-row">

                    <!-- Avatar -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#"
                            id="navbarDropdownMenuLink" role="button" data-mdb-dropdown-init aria-expanded="false">
                            <img src="{{ asset('storage/profiles/' . $profile->profile_pict) }}" class="rounded-circle"
                                height="32" alt="" loading="lazy" />
                            <span class="mx-2 ml-4 text-sm hidden md:inline-block">@yield('nama')</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Keluar</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
    </header>
    <!--Main layout-->
    <main style="margin-top: 58px">
        <div class="container pt-4">
            {{-- konten --}}
            @yield('content')
        </div>
    </main>



    <!-- Custom scripts -->
    <script type="text/javascript" src="../js/dashboard/mdb.umd.min.js"></script>
    <script type="text/javascript" src="../js/dashboard/admin.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    @yield('scripts')
</body>

</html>
