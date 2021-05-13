@php
    /**
     * @var \App\Services\AdminDashboard\FetchDashboard\FetchDashboardResponse $response
     */
@endphp
@extends('admin.layout')

@section('title', 'ダッシュボード|Aegis')

@section('body')
    @component('admin.header.header', ['href' => route('front.index')])
        @include('front.header._link_login_logout')
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

    <div class="l-container--2col">
        <div class="l-sidebar">
            @include('admin.pages.dashboard._RegularList')
        </div>
        <div class="l-main">
            <div class="p-mainItem">
                <h2 class="p-level2Heading">各種ステータス</h2>
                <form action="{{ route('user.status') }}" method="get">
                <div class="p-counterUnit--col2">
                    <div class="p-counter u-mt-0">
                        <p class="c-text--bold p-counter__title"><button type="submit" name="status" value="1">今月営業開始</button></p>
                        <div class="p-counter__countWrap">
                            <span class="p-counter__count">{{ $response->getFetchUserOperation()->count() ?? 0 }}</span><span>件</span>
                        </div>
                    </div>
                    <div class="p-counter u-mt-0">
                        <p class="c-text--bold p-counter__title c-tooltip"><button type="submit" name="status" value="2">未営業</button>
                            <span class="c-tooltip__text--up">今月営業月だがまだ未営業の人数</span>
                        </p>
                        <div class="p-counter__countWrap">
                            <span class="p-counter__count">{{ $response->getFetchNotOpen()->count() ?? 0 }}</span><span>件</span>
                        </div>
                    </div>
                    <div class="p-counter">
                        <p class="c-text--bold p-counter__title c-tooltip"><button type="submit" name="status" value="3">新規稼働件数</button>
                            <span class="c-tooltip__text--up">新規で今月稼働する人数</span>
                        </p>
                        <div class="p-counter__countWrap">
                            <span class="p-counter__count">{{ $response->getFetchNewAssignUser()->count() ?? 0 }}</span><span>件</span>
                        </div>
                    </div>
                    <div class="p-counter u-mt-10-pc">
                        <p class="c-text--bold p-counter__title c-tooltip"><button type="submit" name="status" value="4">既存稼働件数</button>
                            <span class="c-tooltip__text--up">既存で今月稼働する人数</span>
                        </p>
                        <div class="p-counter__countWrap">
                            <span class="p-counter__count">{{ $response->getFetchAssignUser()->count() ?? 0 }}</span><span>件</span>
                        </div>
                    </div>
                    <div class="p-counter u-mt-10-pc">
                        <p class="c-text--bold p-counter__title"><button type="submit" name="status" value="5">今月面談件数</button></p>
                        <div class="p-counter__countWrap">
                            <span class="p-counter__count">{{ $response->getFetchInterview()->count() ?? 0}}</span><span>件</span>
                        </div>
                    </div>
                </div>
                </form>
                {{--   各種ステータス   --}}

                <h2 class="p-level2Heading u-mt-20">クイックアクション</h2>

                <div class="p-flex--col2">
                    <a href="{{ route('project.create.form') }}" class="p-button p-flex__item">
                        <img class="p-button__icon" src="images/icons/icon_file.svg" alt="">
                        <div class="p-button__box">
                            <h2 class="p-button__boxTitle">案件追加</h2>
                            <p class="p-button__boxText">案件の登録処理を行います</p>
                        </div>
                    </a>
                    {{--   案件追加   --}}

                    <a href="{{ route('agent.create.form') }}" class="p-button p-flex__item">
                        <img class="p-button__icon" src="images/icons/icon_building.svg" alt="">
                        <div class="p-button__box">
                            <h2 class="p-button__boxTitle">案件元追加</h2>
                            <p class="p-button__boxText">案件元の登録処理を行います</p>
                        </div>
                    </a>
                    {{--   案件元追加   --}}

                    <a href="{{ route('station.create.form') }}" class="p-button p-flex__item">
                        <img class="p-button__icon" src="images/icons/icon_train.svg" alt="">
                        <div class="p-button__box">
                            <h2 class="p-button__boxTitle">駅追加</h2>
                            <p class="p-button__boxText">駅の登録処理を行います</p>
                        </div>
                    </a>
                    {{--   駅追加   --}}
                </div>

            </div>
            {{--    p-mainItem   --}}
        </div>
    </div>

    @include('admin.footer.footer')
@endsection
