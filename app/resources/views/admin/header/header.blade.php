<header class="Header">
    <div class="Header__loginWrap">
        <a href="{{ route('front.index') }}" class="Header__textLink mr-a">
            <img src="{{ asset('images/logo/aegis.svg') }}" alt="aegisのロゴ" class="w-40">
        </a> 
        {{ $slot ?? '' }}
    </div>
</header>

