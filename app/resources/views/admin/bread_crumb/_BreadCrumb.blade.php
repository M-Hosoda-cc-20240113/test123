<ol class="p-breadCrumb">
    {{-- ユーザーリスト  --}}
    @if(url()->current() === route('user.list') || url()->current() === route('user.search'))
        <li><a href="{{ route('admin.index') }}"><span>ホーム</span></a></li>
        <li><a href="{{ route('user.list') }}"><span>ユーザー一覧</span></a></li>
    @endif

    {{-- ユーザー詳細  --}}
    @if(Route::currentRouteName() === 'user.detail')
        <li><a href="{{ route('admin.index') }}"><span>ホーム</span></a></li>
        <li><a href="{{ route('user.list') }}"><span>ユーザー一覧</span></a></li>
        <li><a href=""><span>ユーザー詳細</span></a></li>
    @endif

    {{-- 案件リスト --}}
    @if(url()->current() === route('project.list'))
        <li><a href="{{ route('admin.index') }}"><span>ホーム</span></a></li>
        <li><a href="{{ route('project.list') }}"><span>案件一覧</span></a></li>
    @endif

    {{-- 案件詳細 --}}
    @if(Route::currentRouteName() === 'project.detail')
        <li><a href="{{ route('admin.index') }}"><span>ホーム</span></a></li>
        <li><a href="{{ route('project.list') }}"><span>案件一覧</span></a></li>
        <li><a href=""><span>案件詳細</span></a></li>
    @endif

    {{-- 案件作成 --}}
    @if(url()->current() === route('project.create'))
        <li><a href="{{ route('admin.index') }}"><span>ホーム</span></a></li>
        <li><a href="{{ route('project.list') }}"><span>案件一覧</span></a></li>
        <li><a href="{{ route('project.create') }}"><span>新規案件登録</span></a></li>
    @endif

    {{-- 応募リスト --}}
    @if(url()->current() === route('application.list'))
        <li><a href="{{ route('admin.index') }}"><span>ホーム</span></a></li>
        <li><a href="{{ route('application.list') }}"><span>応募状況一覧</span></a></li>
    @endif

    {{-- アサインリスト --}}
    @if(url()->current() === route('assignment.list'))
        <li><a href="{{ route('admin.index') }}"><span>ホーム</span></a></li>
        <li><a href="{{ route('assignment.list') }}"><span>稼働状況一覧</span></a></li>
    @endif

    {{-- 案件元リスト --}}
    @if(url()->current() === route('agent.list'))
        <li><a href="{{ route('admin.index') }}"><span>ホーム</span></a></li>
        <li><a href="{{ route('agent.list') }}"><span>案件元会社一覧</span></a></li>
    @endif

    {{-- エージェント登録 --}}
    @if(url()->current() === route('agent.create'))
        <li><a href="{{ route('admin.index') }}"><span>ホーム</span></a></li>
        <li><a href="{{ route('agent.list') }}"><span>案件元会社一覧</span></a></li>
        <li><a href="{{ route('agent.create') }}"><span>案件元会社新規登録</span></a></li>
    @endif

    {{-- 駅名リスト --}}
    @if(url()->current() === route('station.list'))
        <li><a href="{{ route('admin.index') }}"><span>ホーム</span></a></li>
        <li><a href="{{ route('station.list') }}"><span>駅名一覧</span></a></li>
    @endif

    {{-- 新規駅名登録 --}}
    @if(url()->current() === route('station.create'))
        <li><a href="{{ route('admin.index') }}"><span>ホーム</span></a></li>
        <li><a href="{{ route('station.list') }}"><span>駅名一覧</span></a></li>
        <li><a href="{{ route('station.create') }}"><span>新規駅名登録</span></a></li>
    @endif

    {{-- ポジションリスト --}}
    @if(url()->current() === route('position.list'))
        <li><a href="{{ route('admin.index') }}"><span>ホーム</span></a></li>
        <li><a href="{{ route('position.list') }}"><span>ポジション一覧</span></a></li>
    @endif

    {{-- ポジション新規登録 --}}
    @if(url()->current() === route('position.createForm'))
        <li><a href="{{ route('admin.index') }}"><span>ホーム</span></a></li>
        <li><a href="{{ route('position.list') }}"><span>ポジション一覧</span></a></li>
        <li><a href="{{ route('position.createForm') }}"><span>ポジション新規登録</span></a></li>
    @endif

    {{-- スキルリスト --}}
    @if(url()->current() === route('skill.list'))
        <li><a href="{{ route('admin.index') }}"><span>ホーム</span></a></li>
        <li><a href="{{ route('skill.list') }}"><span>スキル一覧</span></a></li>
    @endif

    {{-- スキル新規登録 --}}
    @if(url()->current() === route('skill.create'))
        <li><a href="{{ route('admin.index') }}"><span>ホーム</span></a></li>
        <li><a href="{{ route('skill.list') }}"><span>スキル一覧</span></a></li>
        <li><a href="{{ route('skill.createForm') }}"><span>スキル新規登録</span></a></li>
    @endif

    {{-- レベルリスト --}}
    @if(url()->current() === route('level.list'))
        <li><a href="{{ route('admin.index') }}"><span>ホーム</span></a></li>
        <li><a href="{{ route('level.list') }}"><span>レベル一覧</span></a></li>
    @endif

    {{-- レベル新規登録 --}}
    @if(url()->current() === route('level.create'))
        <li><a href="{{ route('admin.index') }}"><span>ホーム</span></a></li>
        <li><a href="{{ route('level.list') }}"><span>レベル一覧</span></a></li>
        <li><a href="{{ route('level.createForm') }}"><span>レベル新規登録</span></a></li>
    @endif
</ol>
