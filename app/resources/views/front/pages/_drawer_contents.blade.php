<nav class="p-drawerContents">
  <ul>
    <li>@include('front.header._link_login_logout')</li>
    @auth
    <li>@include('front.header._link_mypage')</li>
    <li><a href="{{ route('front.user.edit') }}">ユーザー情報編集</a></li>
    <li><a href="{{ route('password.request') }}">パスワード変更</a></li>
    <li><a href="{{ route('email.request') }}">メールアドレス変更</a></li>
    @if(!Auth::getUser()->is_admin)
      <li><a href="{{ route('front.user.skill.form') }}">スキル編集</a></li>
      <li><a href="{{ route('front.user.delete.form') }}">退会</a></li>
    @endif
    @endauth
  </ul>
</nav>
