@php
    $x = env('APP_ASSETS' , '/');
    if (!$x) {
        $x = '/';
    }
    $url = $x;
@endphp

    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ $url }}logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="{{ $url }}css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="{{ $url }}css/vendor/jquery.dataTables.css">
    <link rel="stylesheet" href="{{ $url }}css/sidebar.css">
    <link rel="stylesheet" href="{{ $url }}css/app.css">
    <title>@yield('title')</title>
</head>

<body>

<!--Main Navigation-->
<header>
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="sidebar-links collapse d-lg-block sidebar collapse bg-white">
        <div class="" style="overflow-y:auto;height:550px">
            <div class="list-group list-group-flush mx-3 mt-4" style="padding-bottom: 100px">
                <a href={{ route('notes.index') }} class="list-group-item list-group-item-action py-2 ripple orders"><i
                    class="fas fa-chart-bar fa-fw me-3"></i><span>Notes</span></a>
            </div>
        </div>
    </nav>
    <!-- Sidebar -->

    <!-- Navbar -->
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
                    aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Brand -->
            <a class="navbar-brand" href="#">
                <h3>Pharmacy System</h3>
            </a>
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
</header>
<!--Main Navigation-->

<!--Main layout-->
<main style="margin-top: 58px">
    <div class="container pt-4">

    </div>
</main>
<!--Main layout-->
<section class="container content">
    @yield('content')
</section>
<script src="{{ $url }}js/vendor/jquery.min.js"></script>
<script src="{{ $url }}js/vendor/bootstrap.min.js"></script>
<script src="{{ $url }}js/vendor/bootstrap.bundle.min.js"></script>
<script src="{{ $url }}js/vendor/jquery.dataTables.js"></script>
</body>

</html>

@yield('active')

@yield('ajx')
