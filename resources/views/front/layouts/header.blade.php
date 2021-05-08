<header>

    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <smallnav class="navbar navbar-dark py-0 bg-dark navbar-expand-lg py-md-0 text-white">


        <div class="navbar-collapse collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item py-0"><a href="#" class="nav-link">Home</a></li>
                <li class="nav-item py-0"><a href="#" class="nav-link">{{ date('D, d-F-y H:i') }}

                    </a></li>

                <li class="nav-item py-0"><a href="#" class="nav-link">Options</a></li>
                <li>
                    <select class="form-control select2" name="timezone" id="timezone">
                        @foreach(timezone_identifiers_list() as $timezone)
                        <option {{ old('timezone', 'Africa/Cairo') == $timezone ? 'selected' : '' }}>{{ $timezone }}
                        </option>
                        @endforeach
                    </select>
                </li>
            </ul>

        </div>
        <div class="dropdown">
            <ul class="navbar-nav">
                <li class="nav-item py-0"><a href="#" class="nav-link">Login</a></li>
            </ul>

        </div>
    </smallnav>


    <navbar class="site-navbar" role="banner">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-4 site-logo">
                    <a href="{{ route('website') }}" class="text-black h2 mb-0">Mini Blog</a>
                </div>
                <div class="col-8 text-right">
                    <nav class="site-navigation" role="navigation">
                        <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block mb-0">
                            @foreach($categories as $category)
                            <li><a href="{{ route('website.category', ['slug' => $category->slug]) }}">{{ ucfirst($category->name) }}
                                </a></li>
                            @endforeach

                        </ul>
                    </nav>
                    <a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-lg-none"><span
                            class="icon-menu h3"></span></a>
                </div>
            </div>
        </div>
    </navbar>
</header>
