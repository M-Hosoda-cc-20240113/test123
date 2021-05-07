@php
    /**
     * @var \App\Services\AdminDashboard\FetchDashboard\FetchDashboardResponse $response
     */
@endphp
@extends('admin.layout')

@section('title', 'ダッシュボード|Aegis')

@section('body')
    @component('admin.header.header', ['href' => route('front.index')])
        @include('admin.header._link_login_logout')
    @endcomponent
    <div class="l-container--2col">
        <div class="l-sidebar">
            @include('admin.pages.dashboard._RegularList')
        </div>
        <div class="l-main">
            <div class="p-mainItem">
                <h2 class="p-level2Heading">各種ステータス</h2>
                <div class="p-counterUnit--col2">
                    <div class="p-counter u-mt-0">
                        <p class="c-text--bold p-counter__title">今月営業開始</p>
                        <div class="p-counter__countWrap">
                            <span class="p-counter__count">{{ $response->getUserOperationCounts() ?? 0 }}</span><span>件</span>
                        </div>
                    </div>
                    <div class="p-counter u-mt-0">
                        <p class="c-text--bold p-counter__title c-tooltip">未営業
                            <span class="c-tooltip__text--up">今月営業月だがまだ未営業の人数</span>
                        </p>
                        <div class="p-counter__countWrap">
                            <span class="p-counter__count">{{ $response->getNotOpenCounts() ?? 0 }}</span><span>件</span>
                        </div>
                    </div>
                    <div class="p-counter">
                        <p class="c-text--bold p-counter__title">新規稼働件数</p>
                        <div class="p-counter__countWrap">
                            <span class="p-counter__count">{{ $response->getNewAssignCounts() ?? 0 }}</span><span>件</span>
                        </div>
                    </div>
                    <div class="p-counter u-mt-10-pc">
                        <p class="c-text--bold p-counter__title">既存稼働件数</p>
                        <div class="p-counter__countWrap">
                            <span class="p-counter__count">{{ $response->getAssignCounts() ?? 0 }}</span><span>件</span>
                        </div>
                    </div>
                    <div class="p-counter u-mt-10-pc">
                        <p class="c-text--bold p-counter__title">今月面談件数</p>
                        <div class="p-counter__countWrap">
                            <span class="p-counter__count">{{ $response->getInterviewCounts() ?? 0}}</span><span>件</span>
                        </div>
                    </div>
                </div>
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
