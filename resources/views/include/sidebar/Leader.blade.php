

  {{-- عنصر واحد  --}}
  {{-- comment --}}
  
  <div class="nav-lavel">  <strong> <p>المالك الرئيسي </p> </strong> </div>
  <hr>
                <div class="nav-item {{ ($segment1 == 'dashboard') ? 'active' : '' }}">
     <a  href="{{route('dashboard')}}">
         <i class="ik ik-bar-chart-2"></i>
         <span>  اللوحة الرئيسية</span>
     </a>
</div>


<div class="nav-item {{ ($segment1 == 'dashboard') ? 'active' : '' }}">
    <a href="{{route('firm.index')}}">
        <i class="ik ik-bar-chart-2"></i>
        <span>الشركات</span>
        
    </a>
</div>


             {{-- عنوان يظهر فوق اللوحة  --}}
             {{--        <div class="nav-lavel">  <strong> <p>المالك الرئيسي </p> </strong> </div> --}}
             
               

                {{--  لوحة تحتوي على أبناء --}}
                <div class="nav-item {{ ($segment1 == 'form-components' || $segment1 == 'form-advance'||$segment1 == 'form-addon') ? 'active open' : '' }} has-sub">
                         {{--  الأب --}}
                    <a href="#"><i class="ik ik-edit"></i>شركات التسويق</a>
                        {{--  الأبناء--}}
                    <div class="submenu-content">
                        <a href="{{route('addCompany')}}" class="menu-item {{ ($segment1 == 'addCompany') ? 'active' : '' }}"> إضافة شركة جديدة</a>
                        <a href="{{route('showCompany')}}" class="menu-item {{ ($segment1 == 'form-addon') ? 'active' : '' }}">عرض الشركات </a>
                        {{--   <a href="{{url('form-advance')}}" class="menu-item {{ ($segment1 == 'form-advance') ? 'active' : '' }}">{{ __('Advance')}}</a> --}}
                        
                      
                    </div>
                </div>

