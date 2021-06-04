<nav class="p-drawerContents">
  <ul>
    <li class="u-mt-5">@include('front.header._link_login_logout')</li>
    <li class="u-mt-5"><a href="{{ route('front.index') }}">ユーザートップ</a></li>
    <li class="u-mt-5"><a href="{{ route('home.mypage') }}">マイページ</a></li>
    <li class="u-mt-5"><a href="{{ route('user.list') }}">ユーザー一覧</a></li>
    <li class="u-mt-5"><a href="{{ route('project.list') }}">案件一覧</a></li>
    <li class="u-mt-5"><a href="{{ route('application.list') }}">応募状況一覧</a></li>
    <li class="u-mt-5"><a href="{{ route('assignment.list') }}">稼働状況一覧</a></li>
    <li class="u-mt-5"><a href="{{ route('note.list') }}">お知らせ一覧</a></li>
    <li class="u-mt-5"><a href="{{ route('skill.list') }}">スキルマスタ</a></li>
    <li class="u-mt-5"><a href="{{ route('level.list') }}">レベルマスタ</a></li>
    <li class="u-mt-5"><a href="{{ route('station.list') }}">駅マスタ</a></li>
    <li class="u-mt-5"><a href="{{ route('agent.list') }}">案件元会社マスタ</a></li>
    <li class="u-mt-5"><a href="https://form.run/teams#">お問い合わせ（form.run）</a></li>
  </ul>
</nav>
