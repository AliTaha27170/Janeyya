<div class="nav-item {{ ($segment1 == ' ' || isset($a3)) ? 'active' : '' }}">
    <a href="{{ route('getFarmerBills') }}">
        <i class="ik ik-bar-chart-2"></i>
        <span> الفواتير </span>
    </a>
</div>


<div
    class="nav-item {{ ($segment1 == 'form-components' || $segment1 == 'form-advance'||$segment1 == 'form-addon') ? 'active open' : '' }} has-sub">
    <a href="#"><i class="ik ik-edit"></i>الكشوف</a>
    <div class="submenu-content">
        <a href="{{ route('getFarmerBonds') }}" class="menu-item {{ ($segment1 == 'addCompany') ? 'active' : '' }}"> سندات
            الصرف</a>
        <a href="{{ route('getFarmerBondsReceipt') }}" class="menu-item {{ ($segment1 == 'addCompany') ? 'active' : '' }}">
            سندات القبض</a>
    </div>
</div>