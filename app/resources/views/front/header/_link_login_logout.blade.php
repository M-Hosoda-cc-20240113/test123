@auth
  <li class="u-df">
    <a class="p-header__textLink" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <img class="p-image--gray" src="{{ asset('images/icons/icon_logout.svg') }}" alt="">
      <span class="u-as-center">ログアウト</span>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
      {{ csrf_field() }}
    </form>
  </li>
@endauth
@guest
  @include('front.header._link_signup')
  <img class="p-image--gray" src="{{ asset('images/icons/icon_login.svg') }}" alt="">
  <a class="p-header__textLink u-pl-0" href="{{ route('login') }}">ログイン</a>
@endguest
