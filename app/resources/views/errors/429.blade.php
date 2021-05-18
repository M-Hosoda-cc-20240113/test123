@extends('errors.layout')

@section('title', '429|Aegis')

@section('body')
    @component('front.header.header', ['href' => route('front.index')])
        @include('front.header._link_mypage')
        @include('front.header._link_login_logout')
    @endcomponent
    <nav class="p-drawerContents">
        <ul>
            <li class="u-mt-10">@include('front.header._link_mypage')</li>
            <li class="u-mt-10">@include('front.header._link_login_logout')</li>
        </ul>
    </nav>
    <div class="l-container">
        <h2 class="p-level2Heading">内部エラー</h2>
        <p class="c-text">サービス内でエラーが発生しました。恐れ入りますがマイページから再アクセスをお願いします。</p>
    </div>
    @include('errors.footer.footer')
@endsection
