@extends('front.layout')

@section('title', 'メールアドレス変更|Aegis')

@section('body')
    @component('front.header.header', ['href' => route('front.index')])
        @include('front.header._link_mypage')
        @include('front.header._link_login_logout')
    @endcomponent

    <nav class="p-drawerContents">
        <ul>
            <li>@include('front.header._link_mypage')</li>
            <li class="u-mt-10">@include('front.header._link_login_logout')</li>
        </ul>
    </nav>

    <div class="l-container">
        <p class="c-text--center">メールアドレスの変更が完了しました。</p>
        <a href="{{ route('login') }}" class="c-button u-db u-m0a u-w-30-pc u-mt-20">ログイン</a>
    </div>

    @include('front.footer.footer')
@endsection
