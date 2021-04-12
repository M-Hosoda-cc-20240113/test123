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
  @include('atoms.RegularBtn', ['text' => '新規登録', 'class' => 'w-20', 'link' => route('register')])
@endguest
