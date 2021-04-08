<ol class="BreadCrumb">
  @if(url()->current() === route('user.list'))
  <li> <a href="{{ route('index') }}"><span>ホーム</span></a> </li>
  <li> <a href="{{ route('user.list') }}"><span>ユーザー一覧</span></a> </li>
  @endif

  @if(url()->current() === route('project.list'))
  <li> <a href="{{ route('index') }}"><span>ホーム</span></a> </li>
  <li> <a href="{{ route('project.list') }}"><span>案件一覧</span></a> </li>
  @endif
</ol>