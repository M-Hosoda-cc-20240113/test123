@extends('front.layout')

@section('title', '新規案件元会社登録|Aegis')

@section('body')
    @component('admin.header.header', ['href' => route('front.index')])
        @include('admin.header._link_login_logout')
    @endcomponent

    <nav class="p-drawerContents">
        <ul>
            <li class="u-mt-10">@include('front.header._link_login_logout')</li>
            <li class="u-mt-10"><a href="{{ route('user.list') }}">ユーザー一覧</a></li>
            <li class="u-mt-10"><a href="{{ route('project.list') }}">案件一覧</a></li>
            <li class="u-mt-10"><a href="{{ route('application.list') }}">応募状況一覧</a></li>
            <li class="u-mt-10"><a href="{{ route('assignment.list') }}">稼働状況一覧</a></li>
        </ul>
    </nav>

    <div class="l-container">
    <div class="l-container">
        @include('admin.bread_crumb._BreadCrumb')
        <div class="l-main u-mt-20">
            <div class="p-mainItem">
                <h2 class="p-level2Heading">新規案件元会社登録</h2>

                @if($errors->all())
                    <p class="c-text--bold u-mt-20">以下のエラーを修正してください</p>
                    @foreach($errors->all() as $error)
                        <p class="c-text--warning">{{ $error }}</p>
                    @endforeach
                @endif

                <div class="p-register">
                    <form action="{{ route('agent.create') }}" method="post">
                        {{ @csrf_field() }}

                        <div class="p-register__row u-mt-20">
                            <span class="p-register__title c-text--bold">会社名</span>
                            <div class="p-register__itemWrap">
                                <div class="p-register__item">
                                    <input class="c-input " type="text"
                                           placeholder="株式会社Carecon"
                                           name="name"
                                           value="{{ old('name') }}">
                                </div>
                            </div>
                        </div>

                        <div class="p-register__row u-mt-20">
                            <span class="p-register__title c-text--bold">電話番号</span>
                            <div class="p-register__itemWrap">
                                <div class="p-register__item">
                                    <input class="c-input " type="text"
                                           placeholder="08012341234"
                                           name="tel"
                                           value="{{ old('tel') }}">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="c-button u-db u-m0a u-mt-30 u-w-15-pc">新規登録</button>
                    </form>
                </div>
                {{--   p-register   --}}
            </div>
        </div>
    </div>
</div>
    @include('admin.footer.footer')
@endsection
