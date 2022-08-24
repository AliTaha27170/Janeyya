@extends('landing.index')
@section('content')
<!-- inner banner -->
<div class="inner-banner">
    <div class="w3l-breadcrumb">
        <div class="container">
            <h4 class="inner-text-title font-weight-bold mb-2">خدماتنا</h4>
            <ul class="breadcrumbs-custom-path">
                <li><a href="index.html">الرئيسية</a></li>
                <li class="active"><span class="fa fa-chevron-right mx-2" aria-hidden="true"></span>خدماتنا
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- //inner banner -->

<!-- specialties section -->
<section class="w3l-grids-6 py-5">
    <div class="container py-md-5 py-4">
        <div class="row justify-content-center text-center">
            <div class="col-md-8">
                <div class="section-heading mb-sm-5 mb-4">
                    <h3 class="title-style mb-2">خدمات جَـنـيًّـا</h3>
                    <p class="lead">
                        تتنوع خدمات جَـنـيًّـا ويوجد اشياء في الطريق قريباً, ولكن في الفترة الحالية نخدم فقط قطاع التمور لمؤسسات التسويق الزراعي وتجار التمور بالجملة او المفرد والمستهلك 
                    </p>
                </div>
            </div>
        </div>
        <div class="row text-center justify-content-center">
            <div class="col-md-4 col-sm-6">
                <div class="gd-innf">
                    <a href="sales-administration.html"><img class="img-fluid img-responsive" src="{{ asset('assets/front/images/s1.jpg')}}"
                            alt=" "></a>
                    <h3> <a href="sales-administration.html" class="link-text">نظام إدارة المبيعات </a></h3>
                    <a href="sales-administration.html" class="btn blog-btn mt-2">اقرا المزيد</a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mt-sm-0 mt-5">
                <div class="gd-innf">
                    <a href="purchase-management.html"><img class="img-fluid img-responsive" src="{{ asset('assets/front/images/s2.jpg')}}"
                            alt=" "></a>
                    <h3><a href="purchase-management.html" class="link-text">نظام إدارة المشتريات والمخزون </a></h3>
                    <a href="purchase-management.html" class="btn blog-btn mt-2">اقرا المزيد</a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mt-md-0 mt-5">
                <div class="gd-innf">
                    <a href="janeyya-app.html"><img class="img-fluid img-responsive" src="{{ asset('assets/front/images/s3.jpg')}}"
                            alt=" "></a>
                    <h3><a href="janeyya-app.html" class="link-text">تطبيق جَـنـيًّـا</a></h3>
                    <a href="janeyya-app.html" class="btn blog-btn mt-2">اقرا المزيد</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //specialties section -->



<!-- banner bottom section -->
<section class="w3l-services pb-5">
    <div class="container pb-md-5 pb-4">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 grids-feature">
                <div class="area-box">
                    <i class="fa fa-xing" aria-hidden="true"></i>
                    <h4><a href="#feature" class="title-head">Perfect Design</a></h4>
                    <p>Amus a ligula quam tesque et libero ut justo, ultrices in. Ut eu leo non. Duis
                        sed et dolor amet.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 grids-feature mt-md-0 mt-4">
                <div class="area-box">
                    <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                    <h4><a href="#feature" class="title-head">Carefully Planned</a></h4>
                    <p>Amus a ligula quam tesque et libero ut justo, ultrices in. Ut eu leo non. Duis
                        sed dolor et amet.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 grids-feature mt-lg-0 mt-4">
                <div class="area-box">
                    <i class="fa fa-angellist" aria-hidden="true"></i>
                    <h4><a href="#feature" class="title-head">Smartly Execute</a></h4>
                    <p>Amus a ligula quam tesque et libero ut justo, ultrices in. Ut eu leo non. Duis
                        sed dolor et amet.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //banner bottom section -->

<!-- about-2 section -->
<section class="w3l-about-2 py-5">
    <div class="container py-md-5 py-4">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-6 about-2-secs-right mb-lg-0 mb-4 text-center">
                <img src="{{ asset('assets/front/images/img.jpg')}}" alt="" class="img-fluid img-responsive m-auto" />
            </div>
            <div class="col-lg-6 about-2-secs-left pl-lg-5">
                <h3 class="title-style mb-sm-3 mb-2">Your Home, Our Design</h3>
                <h6 class="mb-4">Best Designed to Impress</h6>
                <p>Consectetur adipiscing elit. Aliquam sit amet
                    efficitur tortor.Uspendisse efficitur orci urna. In et augue ornare
                    sapien.</p>
                <p class="mt-3">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                    doloremque laudantium,
                    totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                    dicta sunt explicabo. </p>
                <p class="mt-3">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur
                    magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                <a class="btn btn-style mt-5" href="about.html">Learn More</a>
            </div>
        </div>
    </div>
</section>
<!-- //about-2 section -->
@endsection