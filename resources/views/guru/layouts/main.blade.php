<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Guru</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/css/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="">
    <!-- pace-progress -->
    <link rel="stylesheet" href="/css/plugins/pace-progress/themes/black/pace-theme-flat-top.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/css/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/css/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/css/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="/css/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/css/dist/css/adminlte.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/css/plugins/summernote/summernote-bs4.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/css/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  </head>
  <body>
    
@include('guru.layouts.header')

<div class="container-fluid">
  <div class="row">

    @include('guru.layouts.sidebar')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      @yield('container')
    </main>
  </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    
    <script src="/js/dashboard.js"></script>
  </body>
</html>
