<ol class="p-breadCrumb">
  {{-- ユーザーリスト  --}}
  @if(url()->current() === route('user.list') || url()->current() === route('user.search'))
    <li class="p-breadCrumb__item">
      <a href="{{ route('admin.index') }}"><span>ホーム</span></a>
      @include('admin.bread_crumb._submenu')
    </li>
    <li class="p-breadCrumb__item"><a href="{{ route('user.list') }}"><span>ユーザー一覧</span></a></li>
  @endif

  {{-- ユーザー詳細  --}}
  @if(Route::currentRouteName() === 'user.detail')
    <li class="p-breadCrumb__item">
      <a href="{{ route('admin.index') }}"><span>ホーム</span></a>
      @include('admin.bread_crumb._submenu')
    </li>
    <li class="p-breadCrumb__item"><a href="{{ route('user.list') }}"><span>ユーザー一覧</span></a></li>
    <li class="p-breadCrumb__item"><a href=""><span>ユーザー詳細</span></a></li>
  @endif

  {{-- 案件リスト --}}
  @if(url()->current() === route('project.list') || url()->current() === route('project.list.search'))
    <li class="p-breadCrumb__item">
      <a href="{{ route('admin.index') }}"><span>ホーム</span></a>
      @include('admin.bread_crumb._submenu')
    </li>
    <li class="p-breadCrumb__item"><a href="{{ route('project.list') }}"><span>案件一覧</span></a></li>
  @endif

  {{-- 案件詳細 --}}
  @if(Route::currentRouteName() === 'project.detail')
    <li class="p-breadCrumb__item">
      <a href="{{ route('admin.index') }}"><span>ホーム</span></a>
      @include('admin.bread_crumb._submenu')
    </li>
    <li class="p-breadCrumb__item"><a href="{{ route('project.list') }}"><span>案件一覧</span></a></li>
    <li class="p-breadCrumb__item"><a href=""><span>案件詳細</span></a></li>
  @endif

  {{-- 案件作成 --}}
  @if(url()->current() === route('project.create'))
    <li class="p-breadCrumb__item">
      <a href="{{ route('admin.index') }}"><span>ホーム</span></a>
      @include('admin.bread_crumb._submenu')
    </li>
    <li class="p-breadCrumb__item"><a href="{{ route('project.list') }}"><span>案件一覧</span></a></li>
    <li class="p-breadCrumb__item"><a href="{{ route('project.create') }}"><span>新規登録</span></a></li>
  @endif

  {{-- 応募リスト --}}
  @if(url()->current() === route('application.list'))
    <li class="p-breadCrumb__item">
      <a href="{{ route('admin.index') }}"><span>ホーム</span></a>
      @include('admin.bread_crumb._submenu')
    </li>
    <li class="p-breadCrumb__item"><a href="{{ route('application.list') }}"><span>応募状況一覧</span></a></li>
  @endif

  {{-- アサインリスト --}}
  @if(url()->current() === route('assignment.list'))
    <li class="p-breadCrumb__item">
      <a href="{{ route('admin.index') }}"><span>ホーム</span></a>
      @include('admin.bread_crumb._submenu')
    </li>
    <li class="p-breadCrumb__item"><a href="{{ route('assignment.list') }}"><span>稼働状況一覧</span></a></li>
  @endif

  {{-- 案件元リスト --}}
  @if(url()->current() === route('agent.list'))
    <li class="p-breadCrumb__item">
      <a href="{{ route('admin.index') }}"><span>ホーム</span></a>
      @include('admin.bread_crumb._submenu')
    </li>
    <li class="p-breadCrumb__item"><a href="{{ route('agent.list') }}"><span>案件元会社一覧</span></a></li>
  @endif

  {{-- エージェント登録 --}}
  @if(url()->current() === route('agent.create'))
    <li class="p-breadCrumb__item">
      <a href="{{ route('admin.index') }}"><span>ホーム</span></a>
      @include('admin.bread_crumb._submenu')
    </li>
    <li class="p-breadCrumb__item"><a href="{{ route('agent.list') }}"><span>案件元会社一覧</span></a></li>
    <li class="p-breadCrumb__item"><a href="{{ route('agent.create') }}"><span>新規登録</span></a></li>
  @endif

  {{-- 駅名リスト --}}
  @if(url()->current() === route('station.list'))
    <li class="p-breadCrumb__item">
      <a href="{{ route('admin.index') }}"><span>ホーム</span></a>
      @include('admin.bread_crumb._submenu')
    </li>
    <li class="p-breadCrumb__item"><a href="{{ route('station.list') }}"><span>駅名一覧</span></a></li>
  @endif

  {{-- 新規駅名登録 --}}
  @if(url()->current() === route('station.create'))
    <li class="p-breadCrumb__item">
      <a href="{{ route('admin.index') }}"><span>ホーム</span></a>
      @include('admin.bread_crumb._submenu')
    </li>
    <li class="p-breadCrumb__item"><a href="{{ route('station.list') }}"><span>駅名一覧</span></a></li>
    <li class="p-breadCrumb__item"><a href="{{ route('station.create') }}"><span>新規駅名登録</span></a></li>
  @endif

  {{-- ポジションリスト --}}
  @if(url()->current() === route('position.list'))
    <li class="p-breadCrumb__item">
      <a href="{{ route('admin.index') }}"><span>ホーム</span></a>
      @include('admin.bread_crumb._submenu')
    </li>
    <li class="p-breadCrumb__item"><a href="{{ route('position.list') }}"><span>ポジション一覧</span></a></li>
  @endif

  {{-- ポジション新規登録 --}}
  @if(url()->current() === route('position.createForm'))
    <li class="p-breadCrumb__item">
      <a href="{{ route('admin.index') }}"><span>ホーム</span></a>
      @include('admin.bread_crumb._submenu')
    </li>
    <li class="p-breadCrumb__item"><a href="{{ route('position.list') }}"><span>ポジション一覧</span></a></li>
    <li class="p-breadCrumb__item"><a href="{{ route('position.createForm') }}"><span>新規登録</span></a></li>
  @endif

  {{-- スキルリスト --}}
  @if(url()->current() === route('skill.list'))
    <li class="p-breadCrumb__item">
      <a href="{{ route('admin.index') }}"><span>ホーム</span></a>
      @include('admin.bread_crumb._submenu')
    </li>
    <li class="p-breadCrumb__item"><a href="{{ route('skill.list') }}"><span>スキル一覧</span></a></li>
  @endif

  {{-- スキル新規登録 --}}
  @if(url()->current() === route('skill.createForm'))
    <li class="p-breadCrumb__item">
      <a href="{{ route('admin.index') }}"><span>ホーム</span></a>
      @include('admin.bread_crumb._submenu')
    </li>
    <li class="p-breadCrumb__item"><a href="{{ route('skill.list') }}"><span>スキル一覧</span></a></li>
    <li class="p-breadCrumb__item"><a href="{{ route('skill.createForm') }}"><span>新規登録</span></a></li>
  @endif

  {{-- レベルリスト --}}
  @if(url()->current() === route('level.list'))
    <li class="p-breadCrumb__item">
      <a href="{{ route('admin.index') }}"><span>ホーム</span></a>
      @include('admin.bread_crumb._submenu')
    </li>
    <li class="p-breadCrumb__item"><a href="{{ route('level.list') }}"><span>レベル一覧</span></a></li>
  @endif

  {{-- レベル新規登録 --}}
  @if(url()->current() === route('level.createForm'))
    <li class="p-breadCrumb__item">
      <a href="{{ route('admin.index') }}"><span>ホーム</span></a>
      @include('admin.bread_crumb._submenu')
    </li>
    <li class="p-breadCrumb__item"><a href="{{ route('level.list') }}"><span>レベル一覧</span></a></li>
    <li class="p-breadCrumb__item"><a href="{{ route('level.createForm') }}"><span>新規登録</span></a></li>
  @endif

  {{-- お知らせリスト --}}
  @if(url()->current() === route('note.list'))
    <li class="p-breadCrumb__item">
      <a href="{{ route('admin.index') }}"><span>ホーム</span></a>
      @include('admin.bread_crumb._submenu')
    </li>
    <li class="p-breadCrumb__item"><a href="{{ route('note.list') }}"><span>お知らせ一覧</span></a></li>
  @endif

  {{-- お知らせ新規登録 --}}
  @if(url()->current() === route('note.create.form'))
    <li class="p-breadCrumb__item">
      <a href="{{ route('admin.index') }}"><span>ホーム</span></a>
      @include('admin.bread_crumb._submenu')
    </li>
    <li class="p-breadCrumb__item"><a href="{{ route('note.list') }}"><span>お知らせ一覧</span></a></li>
    <li class="p-breadCrumb__item"><a href=""><span>新規登録</span></a></li>
  @endif

  {{-- お知らせ詳細 --}}
  @if(Route::currentRouteName() === 'note.detail')
    <li class="p-breadCrumb__item">
      <a href="{{ route('admin.index') }}"><span>ホーム</span></a>
      @include('admin.bread_crumb._submenu')
    </li>
    <li class="p-breadCrumb__item"><a href="{{ route('note.list') }}"><span>お知らせ一覧</span></a></li>
    <li class="p-breadCrumb__item"><a href=""><span>お知らせ詳細</span></a></li>
  @endif
</ol>
