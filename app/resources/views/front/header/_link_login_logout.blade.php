@auth
  <li class="">
    <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <span>ログアウト</span>
    </a>
    <form id="logout-form" action="" method="POST">
      {{ csrf_field() }}
    </form>
  </li>
@endauth
@guest
  @include('front.header._link_signup')
  <a class="Header__textLink" href="{{ route('login') }}">ログイン</a>
@endguest
