@extends('landing.index')
@section('content')
 <!-- banner section -->
 <section id="home" class="w3l-banner py-5">
    <div class="container pt-5 pb-md-4">
        <div class="row align-items-center">
            <div class="col-md-6 pt-md-0 pt-4">
                <h3 class="mb-sm-4 mb-3 title"> جَـنـيًّـا
                    <span></span></h3>
                <p> نظام إلكتروني يختص في إدارة المبيعات وإدارة المخزون  <br> .يهتم في مجال التمور في المملكة العربية السعودية  </p>
                <div class="mt-md-5 mt-4 mb-lg-0 mb-4">
                    <a class="btn btn-style" href="services.html">تسجيل الدخول</a>
                </div>
            </div>
            <div class="col-md-6 banner-right mt-md-0 mt-4 text-right">
                <img class="img-fluid" src="{{ asset('assets/front/images/banner222.jpg') }}" alt=" ">
            </div>
        </div>
    </div>
</section>
<!-- //banner section -->

<!-- banner bottom section -->
<section class="w3l-aboutblock py-5">
    <div class="container py-md-5 py-sm-4">
        <div class="row">
            <div class="col-lg-5 left-wthree-img mb-lg-0 mb-5">
                <img class="img-fluid img-responsive" src="{{ asset('assets/front/images/abouttt.png') }}" alt=" ">
            </div>
            <div class="col-lg-7 about-right-faq align-self pl-lg-5">
                <h3 class="title-style mb-2">إدارة المبيعات , إدارة المخزون</h3>
                <h4 class="mt-3"><b class="btn btn-style">إدارة المبيعات</b><br>
                    يستهدف شركات التسويق الزراعي في مجال التمور, وذلك عن طريق تحويل النظام التقليدي في المعاملات والمبيعات الى نظام الكتروني بواجهات رسومية وإدارية كاملة<br> ومن خلال نظام جَـنـيًّـا يتم ربط جميع الاطراف في منظومة البيع والشراء <br> مثل : المزارعين والتجار <br> وإنتقال المعلومات بسرعة ودقة عالية</h4>
                <h4 class="mt-3 fs-3"><b class="btn btn-style">إدارة المخزون</b><br>
                    يستهدف التجار بالجملة في مجال التمور, وذلك عن طريق تحويل النظام التقليدي<br> في المعاملات والمشتريات والمبيعات الى نظام الكتروني بواجهات رسومية وإدارية كاملة<br> ومن خلال نظام جَـنـيًّـا تتم إدارة المشتريات والمبيعات والارتباط مع شركات التسويق الزراعي </h4>
           
            </div>
        </div>
    </div>
</section>
<!-- //banner bottom section -->

<!-- grids section -->
<section class="w3l-grids-sec py-5">
    <div class="container py-md-4">
        <div class="row text-center justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-6 back-image-sec p-0">
                <div class="grid-content-sec column-content p-4">
                    <h4><a href="about.html" class="title-style-anchor">الواجهات البيانية</a></h4>
                    <p class="para">تعرض احصائيات المبيعات والمشتريات والموظفين والمتابعين على مواقع التواصل الإجتماعي</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 p-0">
                <div class="img-column">
                    <img src="{{ asset('assets/front/images/ios_android.png') }}" alt="product" class="img-responsive rounded-0 ">
                </div>
                <div class="column-content mt-sm-4 p-4">
                    <h4><a href="about.html" class="title-style-anchor">الأجهزة الذكية</a></h4>
                    <p class="para">تطبيق جَـنـيًّـا متوفر على جميع الأجهزة الذكية <br> IOS & Android</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 p-0 mt-lg-0 mt-4 d-grid-res">
                <div class="column-content respon-order-2 mb-lg-4 p-4">
                    <h4><a href="about.html" class="title-style-anchor">الدعم الفني </a></h4>
                    <p class="para">يتوفر موظفي الدعم الفني في خدمتكم <br>على مدار 24  ساعة<br><br> </p>
                </div>
                <div class="img-column respon-order-1">
                    <img src="{{ asset('assets/front/images/support.png') }}" alt="product" class="img-responsive rounded-0">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //grids section -->

<!-- text content -->
<div class="w3l-text-6 text-center py-4">
    <div class="container">
        <div class="m-auto" style="max-width:800px;">
            <h3 class="title-style mb-3">للإشتراك في نظام جنيا</h3>
            <p>في الوقت الراهن لم يتم الانتهاء من نظام جنياً<br>اشياء جميلة ستذهلكم بإذن الله</p>
            <a href="about.html" class="btn btn-style mt-5">لا تضغط هنا </a>
        </div>
    </div>
</div>
<!-- //text content -->
@endsection