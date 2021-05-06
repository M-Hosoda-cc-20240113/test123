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
                            <span class="p-counter__count">0</span><span>件</span>
                        </div>
                    </div>
                    <div class="p-counter u-mt-0">
                        <p class="c-text--bold p-counter__title">未営業</p>
                        <div class="p-counter__countWrap">
                            <span class="p-counter__count">0</span><span>件</span>
                        </div>
                    </div>
                    <div class="p-counter">
                        <p class="c-text--bold p-counter__title">テスト</p>
                        <div class="p-counter__countWrap">
                            <span class="p-counter__count">0</span><span>件</span>
                        </div>
                    </div>
                </div>
                {{--   各種ステータス   --}}

            </div>
        </div>
    </div>

    @include('admin.footer.footer')
@endsection
