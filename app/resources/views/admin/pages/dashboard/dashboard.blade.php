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
                            <span class="p-counter__count">{{ $response->getAssignCounts() ?? 0 }}</span><span>件</span>
                        </div>
                    </div>
                    <div class="p-counter u-mt-10-pc">
                        <p class="c-text--bold p-counter__title">既存稼働件数</p>
                        <div class="p-counter__countWrap">
                            <span class="p-counter__count">0</span><span>件</span>
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

            </div>
        </div>
    </div>

    @include('admin.footer.footer')
@endsection
