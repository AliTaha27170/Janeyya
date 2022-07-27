<div class="nav-item {{ ($segment1 == ' ' || isset($a3)) ? 'active' : '' }}">
    <a href="{{ route('getBills') }}">
        <i class="ik ik-bar-chart-2"></i>
        <span> الفواتير  </span>
    </a>
</div>

<div class="nav-item {{ ($segment1 == ' ' || isset($a3)) ? 'active' : '' }}">
    <a href="{{ route('getBonds') }}">
        <i class="ik ik-bar-chart-2"></i>
        <span>  (سندات القبض)الكشوف </span>
    </a>
</div>

<div class="nav-item {{ ($segment1 == ' ' || isset($a3)) ? 'active' : '' }}">
    <a href="{{ route('getBondsReceipt') }}">
        <i class="ik ik-bar-chart-2"></i>
        <span>  (سندات الصرف)الكشوف </span>
    </a>
</div>