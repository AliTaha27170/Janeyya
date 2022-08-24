@extends('landing.index')
@section('content')
    <!-- inner banner -->
    <section class="inner-banner">
        <div class="w3l-breadcrumb">
            <div class="container">
                <h4 class="inner-text-title font-weight-bold mb-2">عن جَـنـيًّـا</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="{{ route('landing.home') }}">الرئيسية</a></li>
                    <li class="active"><span class="fa fa-chevron-right mx-2" aria-hidden="true"></span>جَـنـيًّـا</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- //inner banner -->

    <!-- about section -->
    <section class="about-section pb-5">
        <div class="container">
            <img src="{{ asset('assets/front/images/about.jpg')}}" alt="" class="img-fluid img-responsive">
            <div class="row mt-sm-5 mt-4">
                <div class="col-lg-6 about-left-inner pr-lg-5">
                    <h3 class="title-style">نظام جَـنـيًّـا</h3>
                </div>
                <div class="col-lg-6 about-right-inner mt-lg-0 mt-4">
                    <p>تم اصدار وأعتماد نظام جَـنـيًّـا عام 2021 في شهر رمضان المبارك
                        <br>
                    ابتدئت فكرت النظام وقوامته على مرتكزات ثابته وأهداف واضحة 
                        <br> 
                        اولاً خدمة القطاع الزراعي وتطويرة ثانياً تمكين اللإبتكارات الزراعية
                        <br>
                    أسس نظام جنياً بخطة استارتيجية إبتدئت من الأسواق الزراعية لتسويق التمور ومنتاجاتها بالجملة والهدف ربط منظومة البيع والشراء وحوكمة البيانات بما يصب في منفعة المزارعين - شركات التسويق الزراعي -  تجار التمور - وأمانة المنطقة </p>
                    <br>
                    <p>نظام جَـنـيًّـا يخدم المواطنين في المملكة العربية السعودية ودول الخليج العربي<br> 
                    من خلال تطبيق جَـنـيًّـا يوفر للأشخاص طلب التمور من خلاله 
                        <br>
                    : وبمرتكزات ثابتة  
                        <br>
                        أجود التمور - التوصيل السريع والمجاني - توصيل اعداد بالجملة او بالمفرد</p>
                    
                    
                    
                    <p class="mt-3"></p>
                </div>
            </div>
        </div>
    </section>
    <!-- //about section -->
    
    <!-- stats -->
    <section class="w3_stats py-sm-5 pt-sm-0 pt-4 pb-sm-0 pb-5" id="stats">
        <div class="container pb-md-5 pb-4">
            <div class="w3-stats">
                <div class="row text-center">
                    <div class="col-lg-3 col-sm-6">
                        <div class="counter">
                            <div class="timer count-title count-number" data-to="36" data-speed="500"></div>
                            <p class="count-text">عدد شركات التسويق في نظام جَـنـيًّـا </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mt-sm-0 mt-4">
                        <div class="counter">
                            <div class="timer count-title count-number" data-to="1500" data-speed="500"></div>
                            <p class="count-text">عدد تجار التمور بالجملة</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mt-lg-0 mt-4">
                        <div class="counter">
                            <div class="timer count-title count-number" data-to="14" data-speed="500"></div>
                            <p class="count-text">المناطق المخدومة<br> بالمملكة العربية السعودية</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mt-lg-0 mt-4">
                        <div class="counter border-right-0">
                            <div class="timer count-title count-number" data-to="5" data-speed="500"></div>
                            <p class="count-text">الدول العربية المخدومة</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //stats -->
@endsection