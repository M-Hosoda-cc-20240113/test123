<header class="p-header">
    <div class="p-header__loginWrap">
        <a href="{{ route('front.index') }}" class="p-header__logo u-w-30-sp u-w-100px">
            <img src="{{ asset('images/logo/aegis.svg') }}" alt="aegisのロゴ" class="">
        </a>
        {{ $slot ?? '' }}

        <div class="c-drawer--gray u-as-center u-mr-10 u-dn-pc" id="">
            <span></span>
            <span></span>
            <span></span>
        </div>
        {{--   ドロワー   --}}
    </div>
</header>
<nav class="p-drawerContents">
    <ul>
        <li><a class="c-text" href="#">メニュー1</a></li>
        <li class="u-mt-10"><a class="c-text" href="#">メニュー2</a></li>
        <li class="u-mt-10"><a class="c-text u-mt-20" href="#">メニュー3</a></li>
    </ul>
</nav>
