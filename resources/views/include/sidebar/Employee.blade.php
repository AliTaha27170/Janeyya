{{-- عنصر واحد  --}}
{{-- comment --}}



<div class="nav-item {{ ($segment1 == ' ' || isset($a3)) ? 'active' : '' }}">
    <a href="{{ route('humanResources.index') }}">
        <i class="ik ik-bar-chart-2"></i>
        <span> الطلبات </span>
    </a>
</div>

<div class="nav-item {{ ($segment1 == ' ' || isset($a3)) ? 'active' : '' }}">
    <a href="{{ route('Information.index') }}">
        <i class="ik ik-bar-chart-2"></i>
        <span> المعومات </span>
    </a>
</div>

<div class="nav-item {{ ($segment1 == ' ' || isset($a3)) ? 'active' : '' }}">
    <a href="{{ route('Information.index') }}">
        <i class="ik ik-bar-chart-2"></i>
        <span> المستحقات </span>
    </a>
</div>


{{-- عنصر واحد  --}}
{{-- comment --}}