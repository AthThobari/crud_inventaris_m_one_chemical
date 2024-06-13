<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=fedge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('lte/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('lte/css/sb-admin-2.min.css') }}" rel="stylesheet">
    @yield('css')

</head>

<style>
    .container {
        max-width: 1000px;
        margin-top: 100px;
    }

    .red-border {
        border: 1px solid red;
    }
</style>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-light fixed-top bg-light shadow-sm">
        <div class="container-lg d-flex justify-content-between align-items-center">
            <a class="navbar-brand text-primary fw-bold fs-4" href="#"> <img src="{{ asset('img/chimecal.jpeg') }}"
                    class="custom" width="75px" height="50px" alt=""></a>

            <div class="dropdown">
                <button class="btn btn-primary px-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fas fa-bars"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Data Barang</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.categorie.create') }}">Tambah Kategori Barang</a></li>
                    <hr color="black">

                    <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->
    @yield('content')

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('lte/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('lte/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('lte/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('lte/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('lte/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('lte/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('lte/js/demo/chart-pie-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    @yield('js')


</body>

</html>
