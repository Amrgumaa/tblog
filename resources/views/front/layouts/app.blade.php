<!DOCTYPE html>
<html lang="en">

<head>
    @include('front/layouts/head')
</head>


<body>
    <!-- loading -->
    <div class="se-pre-con"></div>
    <!-- loading -->

    <div class="site-wrap">
        <header>
            @include('front/layouts/header')
        </header>
        @yield('content')

    </div>
    <div class="site-footer">
        @include('front/layouts/footer')
    </div>

    @include('front/layouts/foot')

</body>

</html>
