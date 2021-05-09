<header class="p-header">
    <div class="p-header__loginWrap">
        <a href="{{ route('front.index') }}" class="p-header__logo u-w-30-sp u-w-100px">
            <img src="{{ asset('images/logo/aegis.svg') }}" alt="aegisのロゴ" class="">
        </a>
        {{ $slot ?? '' }}
    </div>
</header>
