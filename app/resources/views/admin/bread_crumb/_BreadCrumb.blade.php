<ol class="BreadCrumb">
  @if(url()->current() === route('user.list'))
  <li> <a href="{{ route('index') }}"><span>ホーム</span></a> </li>
  <li> <a href="{{ route('user.list') }}"><span>ユーザー一覧</span></a> </li>
  @endif

  @if(url()->current() === route('project.list'))
  <li> <a href="{{ route('index') }}"><span>ホーム</span></a> </li>
  <li> <a href="{{ route('project.list') }}"><span>案件一覧</span></a> </li>
  @endif

  @if(url()->current() === route('project.create'))
  <li> <a href="{{ route('index') }}"><span>ホーム</span></a> </li>
  <li> <a href="{{ route('project.create') }}"><span>案件登録</span></a> </li>
  @endif

  @if(url()->current() === route('application.list'))
  <li> <a href="{{ route('index') }}"><span>ホーム</span></a> </li>
  <li> <a href="{{ route('application.list') }}"><span>申し込み状況</span></a> </li>
  @endif
</ol>
