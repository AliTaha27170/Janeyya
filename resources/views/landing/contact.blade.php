@extends('landing.index')
@section('content')
      <!-- inner banner -->
      <div class="inner-banner">
        <section class="w3l-breadcrumb">
            <div class="container">
                <h4 class="inner-text-title font-weight-bold mb-2">تواصل معنا</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="index.html">الرئيسية</a></li>
                    <li class="active"><span class="fa fa-chevron-right mx-2" aria-hidden="true"></span> تواصل معنا</li>
                </ul>
            </div>
        </section>
    </div>
    <!-- //inner banner -->

    <!-- contact -->
    <section class="w3l-contact pb-5" id="contact">
        <div class="container pb-md-5 pb-4">
            <div class="row contact-block">
                <div class="col-lg-7 contact-right mt-5">
                    <h3 class="title-style mb-4 pb-2">ارسل لنا مشاركتك</h3>
                    <form action="https://sendmail.w3layouts.com/submitForm" method="post" class="signin-form">
                        <div class="input-grids">
                            <input type="text" name="w3lName" id="w3lName" placeholder="الاسم*"
                                class="contact-input" required="" />
                            <input type="email" name="w3lSender" id="w3lSender" placeholder="Email*"
                                class="contact-input" required="" />
                            <input type="text" name="w3lSubect" id="w3lSubect" placeholder="الموضوع*"
                                class="contact-input" required="" />
                        </div>
                        <div class="form-input">
                            <textarea name="w3lMessage" id="w3lMessage" placeholder="اكتب رسالتك هنا*"
                                required=""></textarea>
                        </div>
                        <button class="btn btn-style mt-sm-3">ارسال</button>
                    </form>

                    <div class="contact-left mt-5 pt-lg-4">
                        <div class="row cont-details">
                            <div class="col-sm-6">
                                <div class="d-flex contact-grid">
                                    <div class="cont-left text-center mr-3">
                                        <span class="fa fa-globe"></span>
                                    </div>
                                    <div class="cont-right">
                                        <h6>الموقع</h6>
                                        <p>القصيم/بريدة-طريق عمر بن الخطاب</p>
                                    </div>
                                </div>
                                <div class="d-flex contact-grid mt-4 pt-lg-2">
                                    <div class="cont-left text-center mr-3">
                                        <span class="fa fa-phone"></span>
                                    </div>
                                    <div class="cont-right">
                                        <h6>Whatsapp</h6>
                                        <p><a href="tel:+966553210166">+966553210166</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 mt-sm-0 mt-4">
                                <div class="d-flex contact-grid">
                                    <div class="cont-left text-center mr-3">
                                        <span class="fa fa-envelope-open"></span>
                                    </div>
                                    <div class="cont-right">
                                        <h6>Email</h6>
                                        <p><a href="mailto:example@mail.com" class="mail">example@mail.com</a></p>
                                    </div>
                                </div>
                                <div class="d-flex contact-grid mt-4 pt-lg-2">
                                    <div class="cont-left text-center mr-3">
                                        <span class="fa fa-headphones"></span>
                                    </div>
                                    <div class="cont-right">
                                        <h6>خدمة العملاء</h6>
                                        <p><a href="mailto:info@support.com" class="mail">info@support.com</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 mt-lg-0 mt-5 pl-xl-5 pl-lg-4">
                    <div class="map-iframe">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3573.896650468572!2d43.93266318453575!3d26.39452638855793!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x157f57696bb4c563%3A0xcf583bf9bee04e33!2z2LfYsdmK2YIg2KfZhNmF2YTZgyDYs9mE2YXYp9mG2Iwg2K3ZiiDYp9mE2KXYs9mD2KfZhtiMINio2LHZitiv2KkgNTIzNzk!5e0!3m2!1sar!2ssa!4v1620547881996!5m2!1sar!2ssa"
                            width="100%" height="50" frameborder="0" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //contact -->
@endsection