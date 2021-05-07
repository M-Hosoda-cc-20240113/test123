@auth
  <li class="d-flex">
    <a class="p-header__textLink" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <span>ログアウト</span>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
      {{ csrf_field() }}
    </form>
  </li>
@endauth
@guest
  @include('front.header._link_signup')
  <a class="p-header__textLink" href="{{ route('login') }}">ログイン</a>
@endguest
