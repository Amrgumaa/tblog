<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title')</title>
    @include('admin.layouts/includes/head')

</head>

<body class="accent-info sidebar-mini sidebar-collapse">
    <!-- loading -->
    <div class="se-pre-con"></div>
    <!-- loading -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('admin.layouts/includes/navbar')
        <!-- Main Sidebar Container -->
        @include('admin.layouts/includes/sidebar')
        <!-- /.navbar -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @include('admin.layouts/includes/cheader')
            <!-- Main content -->
            <div class="content">


                @yield('maincontent')

            </div>
        </div>
        @include('admin.layouts/includes/csidebar')
        <footer class="main-footer">
            @include('admin.layouts/includes/footer')
        </footer>
    </div>
    @include('admin.layouts/includes/foot')

</body>

</html>
