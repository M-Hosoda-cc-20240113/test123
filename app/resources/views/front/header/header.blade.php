<header class="p-header">
    <div class="p-header__loginWrap">
        <a href="{{ route('front.index') }}" class="p-header__logo">
            <img src="{{ asset('images/logo/aegis.svg') }}" alt="aegisのロゴ" class="u-w-40">
        </a>
        {{ $slot ?? '' }}
    </div>
</header>
