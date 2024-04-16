<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>@yield('title')</title>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0/css/all.css" />
        <!-- Google Fonts Roboto -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
        <!-- MDB -->
        <link rel="stylesheet" href="../css/dashboard/mdb.min.css" />
        <!-- Custom styles -->
        <link rel="stylesheet" href="../css/dashboard/admin.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
    </head>
    
    <body>
        <!--Main Navigation-->
        <header>
            <!-- Sidebar -->
            <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
                <div class="position-sticky">
                    <div class="list-group list-group-flush mx-3 mt-4">
                        <a href="#" class="list-group-item list-group-item-action py-2 active" data-mdb-ripple-init aria-current="true">
                            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action py-2" data-mdb-ripple-init>
                            <i class="fas fa-chart-area fa-fw me-3"></i><span>Kegiatan</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action py-2" data-mdb-ripple-init><i
                            class="fas fa-lock fa-fw me-3"></i><span>Data</span>
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
                        <img src="../img/logo.png" height="35" alt="" loading="lazy" />
                    </a>
                    <!-- Right links -->
                    <ul class="navbar-nav ms-auto d-flex flex-row">
                        <!-- Notification dropdown -->
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink"
                            role="button" data-mdb-dropdown-init aria-expanded="false">
                            <i class="fas fa-bell"></i>
                            <span class="badge rounded-pill badge-notification bg-danger">1</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Some news</a></li>
                            <li><a class="dropdown-item" href="#">Another news</a></li>
                            <li>
                                <a class="dropdown-item" href="#">Something else</a>
                            </li>
                        </ul>
                    </li> --}}
                    
                    <!-- Icon -->
                    {{-- <li class="nav-item">
                        <a class="nav-link me-3 me-lg-0" href="#">
                            <i class="fas fa-fill-drip"></i>
                        </a>
                    </li> --}}
                    <!-- Icon -->
                    {{-- <li class="nav-item me-3 me-lg-0">
                        <a class="nav-link" href="#">
                            <i class="fab fa-github"></i>
                        </a>
                    </li> --}}
                    
                    <!-- Avatar -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#"
                        id="navbarDropdownMenuLink" role="button" data-mdb-dropdown-init aria-expanded="false">
                        <img src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg" class="rounded-circle" height="22"
                        alt="" loading="lazy" />
                        <span class="mx-2 ml-4 text-sm hidden md:inline-block">Susi</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">My profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
</header>

{{-- konten --}}
@yield('content')


<!-- Custom scripts -->
<script type="text/javascript" src="../js/dashboard/mdb.umd.min.js"></script>
<script type="text/javascript" src="../js/dashboard/admin.js"></script>

</body>
</html>
