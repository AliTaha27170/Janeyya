<!doctype html>
<html lang="ar">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>جَـنـيـا</title>
    <!-- google-fonts -->
    <link href="//fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap" rel="stylesheet">
    <!-- //google-fonts -->
    <!-- Template CSS Style link -->
    <link rel="stylesheet" href="assets/css/style-liberty.css">
</head>

<body>
    <!--header-->
    <header id="site-header" class="fixed-top">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg stroke">
                <h1>
                    <a class="navbar-brand d-flex align-items-center" href="index.html">
                        <i class="fa fa-yelp mr-1" aria-hidden="true"></i>جَـنِـيًّـا</a>
                </h1>
                <!-- if logo is image enable this   
    <a class="navbar-brand" href="#index.html">
        <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
    </a> -->

                <!--                
                <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
                    data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                    <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                </button>
-->


                <!--
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ml-lg-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="services.html">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Pages <span class="fa fa-angle-down"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="blog.html">Blog Posts</a>
                                <a class="dropdown-item" href="blog-single.html">Blog Single</a>
                                <a class="dropdown-item" href="error.html">404 Page</a>
                                <a class="dropdown-item" href="email-template.html">Email Template</a>
                                <a class="dropdown-item" href="landing-single.html">Landing Page</a>
                                <a class="dropdown-item" href="shortcodes.html">Shortcodes</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact Us</a>
                        </li>
-->
                <!-- search button -->
                <!--                
                        <div class="search-right ml-lg-3">
                            <form action="error.html" method="GET" class="search-box position-relative">
                                <div class="input-search">
                                    <input type="search" placeholder="Enter Keyword" name="search" required="required"
                                        autofocus="" class="search-popup">
                                </div>
                                <button type="submit" class="btn search-btn"><i class="fa fa-search"
                                        aria-hidden="true"></i></button>
                            </form>
                        </div>
-->
                <!-- //search button -->
                <!--                
                    </ul>
                </div>
-->
                <!-- toggle switch for light and dark theme -->
                {{-- comment --}}

                <div class="cont-ser-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox">
                                <div class="mode-container">

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

    <!-- banner section -->
    <section id="home" class="w3l-banner py-5">
        <div class="container pt-5 pb-md-4">
            <div class="row align-items-center">
                <div class="col-md-6 pt-md-0 pt-4 " style="direction: rtl">
                    <h3 class="right"> شيءٌ <span class="text_y">جميل</span><br> سيكون هنا قريباً <br>
                        <span></span></h3>
                    <br>


                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form__group field">

                            <input type="email" class="form__field click" placeholder="Name" name="email" id='name'
                                required value="{{ old('email') }}" />
                            <label for="name" class="form__label">البريد الإلكتروني </label>
                        </div>

                        <div class="form__group field">
                            <input type="" class="form__field click" placeholder="Name" name="password" id='name'
                                required />
                            <label for="name" class="form__label">كلمة السر </label>
                        </div>
                        @error('email')
                        <div class="form__group field text">
                            <label for="name" class="form__label "> <span class="text_WARNING"> الرجاء التأكد من صحة
                                    المعلومات المدخلة !</span> </label>
                        </div>
                        @enderror

                        @error('password')
                        <div class="form__group field text">
                            <label for="name" class="form__label "> <span class="text_WARNING"> الرجاء التأكد من صحة
                                    المعلومات المدخلة !</span> </label>
                        </div>
                        @enderror

                        <div class="form__group field">
                            <div class="col text-left">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="item_checkbox"
                                        name="item_checkbox" value="option1">
                                    <span class="custom-control-label text_span">&nbsp; تذكرني</span>
                                </label>
                            </div>
                        </div>

                        <div class="form__group field">
                            <label for="name" class="form__label">نسيت كلمة السر ؟ <a
                                    href="{{url('password/forget')}}"><small class="text_span">إعادة تعيين </small>
                                </a></label>
                        </div>
                        <br>

                        <div class="mt-md-5 mt-4 mb-lg-0 mb-4">
                            <button class="btn btn-style"><span class="text_login"> تسجيل الدخول</span> </button>
                        </div>
                </div>
                </form>
                <div class="col-md-6 banner-right mt-md-0 mt-4 text-right">
                    <img class="img-fluid" src="assets/images/144.jpg" alt=" ">
                </div>
            </div>
        </div>
    </section>
    <!-- //banner section -->

    <!-- banner bottom section -->
    <!--
    <section class="w3l-aboutblock py-5">
        <div class="container py-md-5 py-sm-4">
            <div class="row">
                <div class="col-lg-5 left-wthree-img mb-lg-0 mb-5">
                    <img class="img-fluid img-responsive" src="assets/images/about.png" alt=" ">
                </div>
                <div class="col-lg-7 about-right-faq align-self pl-lg-5">
                    <h3 class="title-style mb-2">Let's Make your Interior Better</h3>
                    <p class="mt-3">Lorem ipsum viverra feugiat. Pellen tesque libero ut justo,
                        ultrices in ligula. Semper at tempufddfel. Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Non quae, fugiat.</p>
                    <p class="mt-3">Semper at tempufddfel. Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Non quae, fugiat. Lorem ipsum viverra feugiat. Pellen tesque libero ut justo,
                        ultrices in ligula.</p>
                    <div class="row mt-5">
                        <div class="col-4 about-info-m">
                            <div class="about-detail">
                                <h4>630K+</h4>
                                <p>Furniture and Home design</p>
                            </div>
                        </div>
                        <div class="col-4 about-info-m">
                            <div class="about-detail">
                                <h4>240K+</h4>
                                <p>New Interior design theme</p>
                            </div>
                        </div>
                        <div class="col-4 about-info-m">
                            <div class="about-detail">
                                <h4>960%</h4>
                                <p>Happy clients more for this</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    -->
    <!-- //banner bottom section -->

    <!-- grids section -->
    <!--
    <section class="w3l-grids-sec py-5">
        <div class="container py-md-4">
            <div class="row text-center justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-6 back-image-sec p-0">
                    <div class="grid-content-sec column-content p-4">
                        <h4><a href="about.html" class="title-style-anchor">World Quality</a></h4>
                        <p class="para">Assumenda temporibus quidem ipsam. fuga corporis
                            iusto similique voluptates sint quibusdam.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 p-0">
                    <div class="img-column">
                        <img src="assets/images/grid2.jpg" alt="product" class="img-responsive rounded-0 ">
                    </div>
                    <div class="column-content mt-sm-4 p-4">
                        <h4><a href="about.html" class="title-style-anchor">Awesome Looks</a></h4>
                        <p class="para">Assumenda temporibus quidem ipsam. Voluptate fuga corporis
                            iusto similique voluptates sint quibusdam.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 p-0 mt-lg-0 mt-4 d-grid-res">
                    <div class="column-content respon-order-2 mb-lg-4 p-4">
                        <h4><a href="about.html" class="title-style-anchor">Very comfort</a></h4>
                        <p class="para">Assumenda temporibus quidem ipsam. Voluptate fuga corporis
                            iusto similique voluptates sint quibusdam.</p>
                    </div>
                    <div class="img-column respon-order-1">
                        <img src="assets/images/grid3.jpg" alt="product" class="img-responsive rounded-0">
                    </div>
                </div>
            </div>
        </div>
    </section>
    -->
    <!-- //grids section -->

    <!-- image with content section -->
    <!--
    <section class="image-with-content py-sm-5 py-4">
        <div class="container py-md-5">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-5 content-sec-1">
                    <h4><a href="services.html" class="title-style-anchor">Comfortable Family</a></h4>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit
                        doloremque laudantium, totam rem aperiam, veritatis et quasi.
                    </p>
                    <a class="btn btn-style mt-4" href="services.html">Let's Know More</a>
                </div>
                <div class="col-lg-8 col-md-7 pl-lg-5 mt-md-0 mt-sm-5 mt-4">
                    <img src="assets/images/image1.jpg" alt="product" class="img-responsive">
                </div>
            </div>
            <div class="row align-items-center d-grid-res mt-5 pt-md-4">
                <div class="col-lg-8 col-md-7 pr-lg-5 mt-md-0 mt-sm-5 mt-4 respon-order-2">
                    <img src="assets/images/image2.jpg" alt="product" class="img-responsive">
                </div>
                <div class="col-lg-4 col-md-5 content-sec-1 respon-order-1">
                    <h4><a href="services.html" class="title-style-anchor">Professional Work</a></h4>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit
                        doloremque laudantium, totam rem aperiam, veritatis et quasi.
                    </p>
                    <a class="btn btn-style mt-4" href="services.html">Let's Know More</a>
                </div>
            </div>
        </div>
    </section>
    -->
    <!-- //image with content section -->

    <!-- background section -->
    <!--
    <div class="w3l-background-sec py-5">
        <div class="container py-md-4">
            <div class="content-section py-5">
                <div style="max-width:600px" class="ml-auto py-4 px-sm-5 px-4">
                    <h5 class="title-small mb-2">20% Off</h5>
                    <h3 class="title-style mb-2">Special Sale 2021 </h3>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.</p>
                    <ul class="list-coast mt-4">
                        <li>$790</li>
                        <li class="ml-3 light-color"><del>$1699</del></li>
                    </ul>
                    <div class="mt-5">
                        <a href="about.html" class="btn btn-style">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    -->
    <!-- //background section -->

    <!-- gallery section -->
    <!--
    <div class="gallery section-agile py-5">
        <div class="container py-lg-5 py-md-4">
            <div class="row justify-content-center text-center">
                <div class="col-md-8">
                    <div class="section-heading mb-sm-5 mb-4">
                        <h3 class="title-style mb-2">Our Gallery</h3>
                        <p class="lead">
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque,
                            eaque ipsa quae ab illo inventore.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row gallery_grids">
                <div class="col-4 gallery-img-grid gallery_grid1 hover14 column">
                    <div class="gallery_effect">
                        <a href="assets/images/g1.jpg" class="js-img-viwer d-block">
                            <figure>
                                <img src="assets/images/g1.jpg" alt=" " class="img-fluid" />
                            </figure>
                        </a>
                    </div>
                </div>
                <div class="col-4 gallery-img-grid hover14 column">
                    <div class="gallery_effect">
                        <a href="assets/images/g4.jpg" class="js-img-viwer d-block">
                            <figure>
                                <img src="assets/images/g4.jpg" alt=" " class="img-fluid" />
                            </figure>
                        </a>
                    </div>
                </div>
                <div class="col-4 gallery-img-grid hover14 column">
                    <div class="gallery_effect">
                        <a href="assets/images/g3.jpg" class="js-img-viwer d-block">
                            <figure>
                                <img src="assets/images/g3.jpg" alt=" " class="img-fluid" />
                            </figure>
                        </a>
                    </div>
                </div>
                <div class="col-4 gallery-img-grid hover14 column">
                    <div class="gallery_effect">
                        <a href="assets/images/g2.jpg" class="js-img-viwer d-block">
                            <figure>
                                <img src="assets/images/g2.jpg" alt=" " class="img-fluid" />
                            </figure>
                        </a>
                    </div>
                </div>
                <div class="col-4 gallery-img-grid hover14 column">
                    <div class="gallery_effect">
                        <a href="assets/images/g5.jpg" class="js-img-viwer d-block">
                            <figure>
                                <img src="assets/images/g5.jpg" alt=" " class="img-fluid" />
                            </figure>
                        </a>
                    </div>
                </div>
                <div class="col-4 gallery-img-grid hover14 column">
                    <div class="gallery_effect">
                        <a href="assets/images/g6.jpg" class="js-img-viwer d-block">
                            <figure>
                                <img src="assets/images/g6.jpg" alt=" " class="img-fluid" />
                            </figure>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    -->
    <!-- //gallery section -->

    <!-- text content -->
    <!--
    <div class="w3l-text-6 text-center py-4">
        <div class="container">
            <div class="m-auto" style="max-width:800px;">
                <h3 class="title-style mb-3">We made new creative concept</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                    totam
                    rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi.</p>
                <a href="about.html" class="btn btn-style mt-5">Get Started</a>
            </div>
        </div>
    </div>
    -->
    <!-- //text content -->

    <!-- form section -->
    <!--
    <div class="main-w3 px-md-4 py-5" id="newsletter">
        <div class="container py-md-5 py-4">
            <div class="w3l-forms-9 py-4 m-auto px-md-5 px-4" style="max-width:1000px">
                <div class="container-fluid py-lg-3 py-2">
                    <div class="row align-items-center">
                        <div class="main-midd col-xl-6 col-lg-5">
                            <h4 class="title-head mb-lg-2"><i class="fa fa-envelope mr-1" aria-hidden="true"></i>
                                Subscribe for discount!</h4>
                            <p>Put your email address & get listed</p>
                        </div>
                        <div class="main-midd-2 col-xl-6 col-lg-7 mt-lg-0 mt-4">
                            <form action="#url" method="GET" class="rightside-form">
                                <input type="email" class="form-control" name="email" placeholder="Enter your email">
                                <button class="btn" type="submit">Get Started</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    -->
    <!-- //form section -->

    <!-- footer -->
    <!--
    <section class="w3l-footer-29-main">
        <div class="footer-29 py-5">
            <div class="container py-lg-4">
                <div class="row footer-top-29">
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-md-3 col-6 footer-list-29">
                                <ul>
                                    <h6 class="footer-title-29">Company</h6>
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="#features">Features</a></li>
                                    <li><a href="#faqs">FAQ's</a></li>
                                    <li><a href="#reviews">Reviews</a></li>
                                </ul>
                            </div>
                            <div class="col-md-3 col-6 footer-list-29">
                                <ul>
                                    <h6 class="footer-title-29">Explore</h6>
                                    <li><a href="#privacy">Privacy Policy</a></li>
                                    <li><a href="#terms"> Terms of Service</a></li>
                                    <li><a href="contact.html">Contact us</a></li>
                                    <li><a href="#support"> Support</a></li>
                                </ul>
                            </div>
                            <div class="col-md-3 col-6 footer-list-29 mt-md-0 mt-4">
                                <ul>
                                    <h6 class="footer-title-29">More Info</h6>
                                    <li><a href="#fitment">How it works</a></li>
                                    <li><a href="about.html">About us</a></li>
                                    <li><a href="#fitment">Decline rules</a></li>
                                    <li><a href="#terms">Terms of use</a></li>
                                </ul>
                            </div>
                            <div class="col-md-3 col-6 footer-list-29 mt-md-0 mt-4">
                                <h6 class="footer-title-29">Get Started</h6>
                                <ul>
                                    <li><a href="#order">Order status</a></li>
                                    <li><a href="#shipping">Shipping</a></li>
                                    <li><a href="#destination">Destination</a></li>
                                    <li><a href="#delivery">Delivery</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 footer-contact-list mt-lg-0 mt-md-5 mt-4">
                        <h6 class="footer-title-29">Contact Info </h6>
                        <ul>
                            <li class="d-flex align-items-center py-2"><i class="fa fa-map-marker mr-2"
                                    aria-hidden="true"></i>10001, 5th Avenue, USA</li>
                            <li class="d-flex align-items-center py-2"><i class="fa fa-phone mr-2"
                                    aria-hidden="true"></i><a href="tel:+12 23456790">+12
                                    23456790</a></li>
                            <li class="d-flex align-items-center py-2"><i class="fa fa-envelope mr-2"
                                    aria-hidden="true"></i><a href="mailto:info@example.com">info@example.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    -->
    <!-- //footer -->
    <!-- copyright -->
    <section class="w3l-copyright">
        <div class="container">
            <div class="row bottom-copies">
                <p class="col-lg-8 copy-footer-29"> جميع الحقوق محفوظة _ جَـنـيًّـا © {{ date('Y') }} </p>
                <br>
                <div class="col-lg-4 text-right">
                    <div class="main-social-footer-29">
                        <a href="#twitter" class="twitter"><span class="fa fa-twitter"></span></a>
                        <a href="#instagram" class="instagram"><span class="fa fa-instagram"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //copyright -->

    <!-- Js scripts -->
    <!-- move top -->
    <button onclick="topFunction()" id="movetop" title="Go to top">
        <span class="fa fa-level-up" aria-hidden="true"></span>
    </button>
    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("movetop").style.display = "block";
            } else {
                document.getElementById("movetop").style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    <!-- //move top -->

    <!-- common jquery plugin -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <!-- //common jquery plugin -->

    <!-- gallery popup js -->
    <script src="assets/js/smartphoto.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sm = new SmartPhoto(".js-img-viwer", {
                showAnimation: false
            });
            // sm.destroy();
        });
    </script>
    <!-- //gallery popup js -->

    <!-- theme switch js (light and dark)-->
    <script src="assets/js/theme-change.js"></script>
    <script>
        function autoType(elementClass, typingSpeed) {
            var thhis = $(elementClass);
            thhis.css({
                "position": "relative",
                "display": "inline-block"
            });
            thhis.prepend('<div class="cursor" style="right: initial; left:0;"></div>');
            thhis = thhis.find(".text-js");
            var text = thhis.text().trim().split('');
            var amntOfChars = text.length;
            var newString = "";
            thhis.text("|");
            setTimeout(function () {
                thhis.css("opacity", 1);
                thhis.prev().removeAttr("style");
                thhis.text("");
                for (var i = 0; i < amntOfChars; i++) {
                    (function (i, char) {
                        setTimeout(function () {
                            newString += char;
                            thhis.text(newString);
                        }, i * typingSpeed);
                    })(i + 1, text[i]);
                }
            }, 1500);
        }

        $(document).ready(function () {
            // Now to start autoTyping just call the autoType function with the 
            // class of outer div
            // The second paramter is the speed between each letter is typed.   
            autoType(".type-js", 200);
        });
    </script>
    <!-- //theme switch js (light and dark)-->

    <!-- MENU-JS -->
    <script>
        $(window).on("scroll", function () {
            var scroll = $(window).scrollTop();

            if (scroll >= 80) {
                $("#site-header").addClass("nav-fixed");
            } else {
                $("#site-header").removeClass("nav-fixed");
            }
        });

        //Main navigation Active Class Add Remove
        $(".navbar-toggler").on("click", function () {
            $("header").toggleClass("active");
        });
        $(document).on("ready", function () {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
            $(window).on("resize", function () {
                if ($(window).width() > 991) {
                    $("header").removeClass("active");
                }
            });
        });
    </script>
    <!-- //MENU-JS -->

    <!-- disable body scroll which navbar is in active -->
    <script>
        $(function () {
            $('.navbar-toggler').click(function () {
                $('body').toggleClass('noscroll');
            })
        });
    </script>
    <!-- //disable body scroll which navbar is in active -->

    <!--bootstrap-->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- //bootstrap-->
    <!-- //Js scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
    $('.click').click(function () {
        $(".text").slideUp();
        
    });
});
    </script>


</body>

</html>