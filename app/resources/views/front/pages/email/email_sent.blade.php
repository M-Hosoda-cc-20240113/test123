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
            <li>@include('front.header._link_login_logout')</li>
            @auth
            <li><a href="{{ route('front.user.edit') }}">ユーザー情報編集</a> </li>
            <li><a href="{{ route('password.request') }}">パスワード変更</a> </li>
            <li><a href="{{ route('email.request') }}">メールアドレス変更</a> </li>
            <li><a href="{{ route('front.user.skill.form') }}">スキル編集</a></li>
            <li><a href="{{ route('front.user.delete.form') }}">退会</a></li>
            @endauth
        </ul>
    </nav>

    <div class="l-container--2col @guest u-jc-center @endguest">
        @auth
          @include('front.pages.mypage._sidebar')
        @endauth
        <div class="l-main">
            <div class="p-mainItem">
                <h2 class="p-level2Heading">メールアドレス変更</h2>
                <p class="c-text u-mt-20">入力いただいたアドレスへ、変更のご案内をお送りしました。</p>
            </div>
        </div>
    </div>

    @include('front.footer.footer')
@endsection
