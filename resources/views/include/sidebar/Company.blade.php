@php
    use App\helpers\bills;

@endphp
<style>
    .menu-item {
        background-color: #363a3b;
    }
</style>


{{-- عنصر واحد  --}}
{{-- comment --}}



<div class="nav-item {{ ($segment1 == 'dashboard') ? 'active' : '' }}">
    <a href="{{route('dashboard')}}">
        <i class="ik ik-bar-chart-2"></i>
        <span> اللوحة الرئيسية</span>
        
    </a>
</div>

{{--  لوحة تحتوي على أبناء --}}
<div
    class="nav-item {{  ( isset($segm) and( $segm == 56456 || $segm == 56457)) ? 'active open' : '' }} has-sub">
    {{--  الأب --}}
    <a href="#"><i class="ik ik-edit"></i>الكشوف </a>
    {{--  الأبناء--}}
    <div class="submenu-content">
        <a href="#" class="menu-item {{ ($segment1 == 'addCompany') ? 'active' : '' }} nav-item "> كشف حساب مفصل </a>
        <a href="{{ route("getBondAccount",8) }}" class="menu-item {{ (isset($segm) and( $segm == 56456)) ? 'active' : '' }} nav-item">-- كشف حساب مفصل  تاجر</a>
        <a href="{{ route("getBondAccount",6) }}" class="menu-item {{ (isset($segm) and( $segm == 56457)) ? 'active' : '' }} nav-item">-- كشف حساب مفصل  مزارع</a>
        {{-- <a href="{{ route("getBondAccount",1) }}" class="menu-item {{ ($segment1 == 'addCompany') ? 'active' : '' }} nav-item">-- كشف حساب مفصل  موظفين</a>
        <a href="{{ route('getItemAccount') }}" class="menu-item {{ ($segment1 == 'form-addon') ? 'active' : '' }}"> كشف حساب بالاصناف </a>
        <a href="{{ route('getAllAccount') }}" class="menu-item {{ ($segment1 == 'form-addon') ? 'active' : '' }}"> كشف بجميع الحسابات </a> --}}

        {{--  لوحة تحتوي على أبناء --}}
        <div
            class="nav-item {{ ($segment1 == 'form-components' || $segment1 == 'form-advance'||$segment1 == 'form-addon') ? 'active open' : '' }} has-sub">
            {{--  الأب --}}
            {{-- <a href="#" style="background-color: #5c7160"><i class="ik ik-edit"></i>كشف المديونات </a> --}}
            {{--  الأبناء--}}
            <div class="submenu-content">
                <a href="#" class="menu-item {{ ($segment1 == 'addCompany') ? 'active' : '' }}"> التجار </a>
                <a href="#" class="menu-item {{ ($segment1 == 'form-addon') ? 'active' : '' }}"> المزارعون </a>
                <a href="#" class="menu-item {{ ($segment1 == 'form-addon') ? 'active' : '' }}"> الكتاب </a>
                <a href="#" class="menu-item {{ ($segment1 == 'form-addon') ? 'active' : '' }}"> الموظفون </a>


                {{--   <a href="{{url('form-advance')}}" class="menu-item
                {{ ($segment1 == 'form-advance') ? 'active' : '' }}">{{ __('Advance')}}</a> --}}


            </div>
        </div>


        {{--   <a href="{{url('form-advance')}}" class="menu-item
        {{ ($segment1 == 'form-advance') ? 'active' : '' }}">{{ __('Advance')}}</a> --}}


    </div>
</div>

<div class="nav-item {{ ($segment1 == 'dashboard') ? 'active' : '' }}">
    <a href="{{route('expenses.index')}}">
        <i class="ik ik-bar-chart-2"></i>
        <span>المصاريف</span>
        
    </a>
</div>

{{--  لوحة تحتوي على أبناء --}}
<div
    class="nav-item {{ ($segment1 == 'form-components' || $segment1 == 'form-advance'||$segment1 == 'form-addon' || isset($a1)) ? 'active open' : '' }} has-sub">
    {{--  الأب --}}
    <a href="#"><i class="ik ik-edit"></i>حسابات </a>
    {{--  الأبناء--}}
    <div class="submenu-content">


        {{-- عنوان يظهر فوق اللوحة  --}}
        <div class="nav-lavel">
            {{-- <p style="font-size: 12px; color:#cbc2a6"> الأصول </p> --}}
        </div>


        {{--  لوحة تحتوي على أبناء --}}
        <div
            class="nav-item {{ ($segment1 == 'form-components' || $segment1 == 'form-advance'||$segment1 == 'form-addon') ? 'active open' : '' }} has-sub">
            {{--  الأب --}}
            {{-- <a href="#"><i class="ik ik-edit"></i> الأصول </a> --}}
            {{--  الأبناء--}}
            <div class="submenu-content">
                <a href="#" class="menu-item {{ ($segment1 == 'addCompany') ? 'active' : '' }}">الصندوق والبنك </a>
                <a href="#" class="menu-item {{ ($segment1 == 'addCompany') ? 'active' : '' }}">الكتاب </a>
                <a href="#" class="menu-item {{ ($segment1 == 'addCompany') ? 'active' : '' }}">التجار </a>
                <a href="#" class="menu-item {{ ($segment1 == 'addCompany') ? 'active' : '' }}">ذمم الموظفين </a>
                <a href="#" class="menu-item {{ ($segment1 == 'form-addon') ? 'active' : '' }}">مؤجل البنك </a>
                {{--   <a href="{{url('form-advance')}}" class="menu-item
                {{ ($segment1 == 'form-advance') ? 'active' : '' }}">{{ __('Advance')}}</a> --}}


            </div>
        </div>




        {{-- عنوان يظهر فوق اللوحة  --}}
        <div class="nav-lavel">
            {{-- <p style="font-size: 12px; color:#cbc2a6"> الخصوم </p> --}}
        </div>






        {{--  لوحة تحتوي على أبناء --}}
        <div
            class="nav-item {{ ($segment1 == 'form-components' || $segment1 == 'form-advance'||$segment1 == 'form-addon') ? 'active open' : '' }} has-sub">
            {{--  الأب --}}
            {{-- <a href="#"><i class="ik ik-edit"></i>المزارعون </a> --}}
            {{--  الأبناء--}}
            <div class="submenu-content">
                <a href="#" class="menu-item {{ ($segment1 == 'addCompany') ? 'active' : '' }}">المالك </a>
                <a href="#" class="menu-item {{ ($segment1 == 'form-addon') ? 'active' : '' }}">المستأجر </a>
                {{--   <a href="{{url('form-advance')}}" class="menu-item
                {{ ($segment1 == 'form-advance') ? 'active' : '' }}">{{ __('Advance')}}</a> --}}


            </div>
        </div>

        {{-- عنصر واحد  --}}
        {{-- comment --}}



        <div class="nav-item {{ ($segment1 == ' ') ? 'active' : '' }}">
            {{-- <a href="#"> --}}
                <i class="ik ik-bar-chart-2"></i>
                {{-- <span> الزكاة والدخل </span> --}}
            </a>
        </div>





        {{--  لوحة تحتوي على أبناء --}}
        <div
            class="nav-item {{ ($segment1 == 'form-components' || $segment1 == 'form-advance'||$segment1 == 'form-addon') ? 'active open' : '' }} has-sub">
            {{--  الأب --}}
            {{-- <a href="#"><i class="ik ik-edit"></i>الدائنون </a> --}}
            {{--  الأبناء--}}
            <div class="submenu-content">
                <a href="#" class="menu-item {{ ($segment1 == 'addCompany') ? 'active' : '' }}">شركات الأسمدة </a>
                <a href="#" class="menu-item {{ ($segment1 == 'form-addon') ? 'active' : '' }}">شركات الكرتون </a>
                {{--   <a href="{{url('form-advance')}}" class="menu-item
                {{ ($segment1 == 'form-advance') ? 'active' : '' }}">{{ __('Advance')}}</a> --}}


            </div>
        </div>





        {{-- عنوان يظهر فوق اللوحة  --}}
        <div class="nav-lavel">
            {{-- <p style="font-size: 12px; color:#cbc2a6"> المصروفات </p> --}}
        </div>

        {{--  لوحة تحتوي على أبناء --}}
        <div
            class="nav-item {{ ($segment1 == 'form-components' || $segment1 == 'form-advance'||$segment1 == 'form-addon') ? 'active open' : '' }} has-sub">
            {{--  الأب --}}
            {{-- <a href="#"><i class="ik ik-edit"></i>مصروفات إدارية </a> --}}
            {{--  الأبناء--}}
            <div class="submenu-content">
                <a href="#" class="menu-item {{ ($segment1 == 'addCompany') ? 'active' : '' }}"> كهرباء وماء </a>
                <a href="#" class="menu-item {{ ($segment1 == 'form-addon') ? 'active' : '' }}"> بريد وهاتف </a>
                <a href="#" class="menu-item {{ ($segment1 == 'form-addon') ? 'active' : '' }}"> تأمين طبي </a>
                <a href="#" class="menu-item {{ ($segment1 == 'form-addon') ? 'active' : '' }}"> غرامات ومخالفات </a>
                <a href="#" class="menu-item {{ ($segment1 == 'form-addon') ? 'active' : '' }}"> صيانة عامة </a>
                <a href="#" class="menu-item {{ ($segment1 == 'form-addon') ? 'active' : '' }}"> تذاكر سفر وبدلات </a>

                {{--   <a href="{{url('form-advance')}}" class="menu-item
                {{ ($segment1 == 'form-advance') ? 'active' : '' }}">{{ __('Advance')}}</a> --}}


            </div>
        </div>

        {{--  لوحة تحتوي على أبناء --}}
        <div
            class="nav-item {{ ($segment1 == 'form-components' || $segment1 == 'form-advance'||$segment1 == 'form-addon') ? 'active open' : '' }} has-sub">
            {{--  الأب --}}
            {{-- <a href="#"><i class="ik ik-edit"></i>مصروفات تسويقية </a> --}}
            {{--  الأبناء--}}
            <div class="submenu-content">
                <a href="#" class="menu-item {{ ($segment1 == 'addCompany') ? 'active' : '' }}"> رواتب و عمولات </a>
                <a href="#" class="menu-item {{ ($segment1 == 'form-addon') ? 'active' : '' }}"> ضيافة وخدمات </a>
                <a href="#" class="menu-item {{ ($segment1 == 'form-addon') ? 'active' : '' }}"> هدايا وصدقات </a>
                <a href="#" class="menu-item {{ ($segment1 == 'form-addon') ? 'active' : '' }}"> دعاية وإعلان </a>

                {{--   <a href="{{url('form-advance')}}" class="menu-item
                {{ ($segment1 == 'form-advance') ? 'active' : '' }}">{{ __('Advance')}}</a> --}}


            </div>




        </div>



        {{-- عنوان يظهر فوق اللوحة  --}}
        <div class="nav-lavel">
            <p style="font-size: 12px; color:#cbc2a6"> الأنواع </p>
        </div>


        {{-- عنصر واحد  --}}
        {{-- comment --}}



        <div class="nav-item {{ ($segment1 == ' ' || isset($a1)) ? 'active' : '' }} ">
            <a href="{{ route('showDates') }}" class="nav-item {{ ($segment1 == ' ' || isset($a1)) ? 'active' : '' }} ">
                <i class="ik ik-bar-chart-2"></i>
                <span> أنواع التمور </span>
            </a>
        </div>

        {{-- عنوان يظهر فوق اللوحة  --}}
        <div class="nav-lavel">
            <p style="font-size: 12px; color:#cbc2a6"> الإيرادات </p>
        </div>

        {{--  لوحة تحتوي على أبناء --}}
        <div
            class="nav-item {{ ($segment1 == 'form-components' || $segment1 == 'form-advance'||$segment1 == 'form-addon') ? 'active open' : '' }} has-sub">
            {{--  الأب --}}
            <a href="#"><i class="ik ik-edit"></i>الإيرادات </a>
            {{--  الأبناء--}}
            <div class="submenu-content">
                <a href="#"href="{{ route('Revenue.contract') }}" class="menu-item {{ ($segment1 == 'addCompany') ? 'active' : '' }}"> السعي </a>
                <a  href="#"href="{{ route('Revenue.fee') }}" class="menu-item {{ ($segment1 == 'form-addon') ? 'active' : '' }}"> رسوم عقود </a>
                <a  href="#"href="{{ route('Revenue.quest') }}" class="menu-item {{ ($segment1 == 'form-addon') ? 'active' : '' }}"> غرامات </a>


                {{--   <a href="{{url('form-advance')}}" class="menu-item
                {{ ($segment1 == 'form-advance') ? 'active' : '' }}">{{ __('Advance')}}</a> --}}


            </div>
        </div>

    </div>
</div>











{{-- عنصر واحد  --}}
{{-- comment --}}

<div class="nav-item {{ (isset($segmen ) and $segmen == 4546) ? 'active' : '' }}">
    <a href="{{route('showFunds')}}">
        <i class="ik ik-bar-chart-2"></i>
        <span> الصناديق</span>
    </a>
</div>









{{-- عنصر واحد  --}}
{{-- comment --}}



<div class="nav-item {{ ($segment1 == ' ' || isset($a3)) ? 'active' : '' }}">
    <a href="{{ route('showBills') }}">
        <i class="ik ik-bar-chart-2"></i>
        <span> فواتير </span>
        @if (bills::bill_new() and ! isset($a3) )
        <!-- الإشعارات -->
            <span class="badge badge-danger">{{ bills::bill_new() }}</span>
        @endif
        
    </a>
</div>


{{-- عنصر واحد  --}}
{{-- comment --}}




<div class="nav-item {{ (isset($segmen ) and $segmen == 4545) ? 'active' : '' }}">
    <a href="{{route('receipts_table')}}">
        <i class="ik ik-bar-chart-2"></i>
        <span> سندات الصرف </span>
    </a>
</div>


{{-- عنصر واحد  --}}
{{-- comment --}}







<div class="nav-item {{ (isset($segmen ) and$segmen == 5546) ? 'active' : '' }}">
    <a href="{{route('Catch_Receipts_table')}}">
        <i class="ik ik-bar-chart-2"></i>
        <span> سندات القبض </span>
    </a>
</div>



{{-- عنصر واحد  --}}
{{-- comment --}}



{{-- <div class="nav-item {{ ($segment1 == ' ') ? 'active' : '' }}">
    <a href="#">
        <i class="ik ik-bar-chart-2"></i>
        <span> قيود </span>
    </a>
</div> --}}


{{--  لوحة تحتوي على أبناء --}}
<div class="nav-item {{ 
       ( $segment1 == 'showFarmers' || $segment1 == 'addFarmer'
       ||$segment1 == 'showWriters' || $segment1 == 'addWriter'
       ||$segment1 == 'showD'       || $segment1 == 'addDalal'
       ||$segment1 == 'showWorkers' || $segment1 == 'addWorker'
       ||$segment1 == 'showDealers' || $segment1 == 'addDealer'
       ) ? 'active open' : '' }} has-sub">
    {{--  الأب --}}
    <a href="#"><i class="ik ik-edit"></i> الطاقم </a>
    {{--  الأبناء--}}
    <div class="submenu-content">
        <a href="{{ route('showDealers') }}"
            class="menu-item {{ ($segment1 == 'showDealers' || $segment1 == 'addDealer') ? 'active' : '' }}"> التجار
        </a>
        <a href="{{ route('showFarmers') }}"
            class="menu-item {{ ($segment1 == 'showFarmers' || $segment1 == 'addFarmer') ? 'active' : '' }}"> المزارعون
        </a>
        <a href="{{ route('showWriters') }}"
            class="menu-item {{ ($segment1 == 'showWriters' || $segment1 == 'addWriter') ? 'active' : '' }}"> الكتاب
        </a>
        <a href="{{ route('showWorkers') }}"
            class="menu-item {{ ($segment1 == 'showWorkers' || $segment1 == 'addWorker') ? 'active' : '' }}"> الموظفون
        </a>
        <a href="{{ route('showDalals') }}"
            class="menu-item {{ ($segment1 == 'showD'       || $segment1 == 'addDalal') ? 'active' : '' }}"> الدلالون
        </a>

        {{--   <a href="{{url('form-advance')}}" class="menu-item
        {{ ($segment1 == 'form-advance') ? 'active' : '' }}">{{ __('Advance')}}</a> --}}


    </div>
</div>
<div
    class="nav-item {{ ($segment1 == 'form-components' || $segment1 == 'form-advance'||$segment1 == 'form-addon') ? 'active open' : '' }} has-sub">
    <a href="#"><i class="ik ik-edit"></i>الموارد البشرية</a>
    <div class="submenu-content">
        <a href="{{ route('humanResources.getReason') }}" class="menu-item {{ ($segment1 == 'addCompany') ? 'active' : '' }}">
            جميع الطلبات</a>
        


    </div>
</div>