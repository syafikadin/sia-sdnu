<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | {{ $title }}</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    {{-- Toastr --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    {{-- Custom styles for bootstrap dashboard --}}
    <link href="/css/sidebar-dashboard/sidebar-dashboard.css" rel="stylesheet" />

    {{-- Fontsome Icon --}}
    <link href="/css/plugins/fontawesome-free/css/all.min.css" rel="stylesheet" />

    {{-- Table Custom --}}
    <link rel="stylesheet" href="/css/admin/sidebar.css" />

    <!-- Data Table CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" />

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="/css/admin/index.css">

</head>

<body>

    @include('admin.layouts.header')

    <div class="container-fluid">
        <div class="row">

            @include('admin.layouts.sidebar')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('container')
            </main>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/a3c04fec21.js" crossorigin="anonymous"></script>

    {{-- Toastr --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    {{-- Table Custom --}}
    <!-- Data Table JS -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="/js/my-table.js"></script>
    <script src="/js/guru-table.js"></script>
    <script src="/js/kelas-table.js"></script>
    <script src="/js/mapel-table.js"></script>
    <script src="/js/pembelajaran-table.js"></script>
    <script src="/js/tapel-table.js"></script>

</body>

</html>
