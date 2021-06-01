<nav class="p-drawerContents">
  <ul>
    <li class="u-mt-10">@include('front.header._link_login_logout')</li>
    <li class="u-mt-10"><a href="{{ route('front.index') }}">topページ</a></li>
    <li class="u-mt-10"><a href="{{ route('home.mypage') }}">マイページ</a></li>
    <li class="u-mt-10"><a href="{{ route('user.list') }}">ユーザー一覧</a></li>
    <li class="u-mt-10"><a href="{{ route('project.list') }}">案件一覧</a></li>
    <li class="u-mt-10"><a href="{{ route('application.list') }}">応募状況一覧</a></li>
    <li class="u-mt-10"><a href="{{ route('assignment.list') }}">稼働状況一覧</a></li>
    <li class="u-mt-10"><a href="{{ route('assignment.list') }}">スキルマスタ</a></li>
    <li class="u-mt-10"><a href="{{ route('assignment.list') }}">レベルマスタ</a></li>
  </ul>
</nav>
