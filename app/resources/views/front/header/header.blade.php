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
