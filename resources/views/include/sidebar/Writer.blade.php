

  {{-- عنصر واحد  --}}
  {{-- comment --}}
  
  <div class="nav-lavel">  <strong> <p>{{ auth()->user()->name }} </p> </strong> </div>
  <hr>
                <div class="nav-item {{ ($segment1 == 'dashboard') ? 'active' : '' }}">
     <a  href="{{route('dashboard')}}">
         <i class="ik ik-bar-chart-2"></i>
         <span>  اللوحة الرئيسية</span>
     </a>
</div>


             {{-- عنوان يظهر فوق اللوحة  --}}
             {{--        <div class="nav-lavel">  <strong> <p>المالك الرئيسي </p> </strong> </div> --}}
             
               

                {{--  لوحة تحتوي على أبناء --}}
                <div class="nav-item {{ ($segment1 == 'form-components' || $segment1 == 'form-advance'||$segment1 == 'form-addon') ? 'active open' : '' }} has-sub">
                         {{--  الأب --}}
                    <a href="#"><i class="ik ik-file-text"></i>الفواتير </a>
                        {{--  الأبناء--}}
                    <div class="submenu-content">
                        <a href="{{route('addBill')}}" class="menu-item {{ ($segment1 == 'addBill') ? 'active' : '' }}"> إضافة فاتورة جديدة</a>
                        <a href="{{route('showBills')}}" class="menu-item {{ ($segment1 == 'showBills') ? 'active' : '' }}">عرض الفواتير  </a>
                        <a href="{{route('showBills_today')}}" class="menu-item {{ ($segment1 == 'showBills_today') ? 'active' : '' }}"> فواتير اليوم   </a>

                        {{--   <a href="{{url('form-advance')}}" class="menu-item {{ ($segment1 == 'form-advance') ? 'active' : '' }}">{{ __('Advance')}}</a> --}}
                        
                      
                    </div>
                </div>

