 <!--header-->
 <header id="site-header" class="fixed-top">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg stroke">
            <h1>
                <a class="navbar-brand d-flex align-items-center" href="{{ route('landing.home') }}">
                    <i aria-hidden="true"></i>جَـنـيًّـا</a>
            </h1>
             {{-- if logo is image enable this    --}}

            <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
                data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                <span class="navbar-toggler-icon fa icon-close fa-times"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav ml-lg-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('landing.home') }}">الرئيسية<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('landing.about') }}"> جَـنـيًّـا</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('landing.services') }}">خدماتنا</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('landing.contact') }}">تواصل معنا</a>
                    </li>
                    <!-- search button -->
                    <div class="search-right ml-lg-3">
                        <form action="error.html" method="GET" class="search-box position-relative">
                            <div class="input-search">
                                <input type="search" placeholder="البحث" name="search" required="required"
                                    autofocus="" class="search-popup">
                            </div>
                            <button type="submit" class="btn search-btn"><i class="fa fa-search"
                                    aria-hidden="true"></i></button>
                        </form>
                    </div>
                    <!-- //search button -->
                </ul>
            </div>
            <!-- toggle switch for light and dark theme -->
            <div class="cont-ser-position">
                <nav class="navigation">
                    <div class="theme-switch-wrapper">
                        <label class="theme-switch" for="checkbox">
                            <input type="checkbox" id="checkbox">
                            <div class="mode-container">
                                <i class="gg-sun"></i>
                                <i class="gg-moon"></i>
                            </div>
                        </label>
                    </div>
                </nav>
            </div>
            <!-- //toggle switch for light and dark theme -->
        </nav>
    </div>
</header>
<!--//header-->