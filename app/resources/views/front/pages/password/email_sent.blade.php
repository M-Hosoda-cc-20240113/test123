@extends('front.layout')

@section('title', 'パスワード再設定|Aegis')

@section('body')
    @component('front.header.header', ['href' => route('front.index')])
        @include('front.header._link_mypage')
        @include('front.header._link_login_logout')
    @endcomponent

    <nav class="p-drawerContents">
        <ul>
            <li>@include('front.header._link_mypage')</li>
            <li>@include('front.header._link_login_logout')</li>
            <li><a href="{{ route('front.user.edit') }}">ユーザー情報編集</a> </li>
            <li><a href="{{ route('password.request') }}">パスワード変更</a> </li>
            <li><a href="{{ route('email.request') }}">メールアドレス変更</a> </li>
            <li><a href="{{ route('front.user.skill.form') }}">スキル編集</a></li>
            <li><a href="{{ route('front.user.delete.form') }}">退会</a></li>
        </ul>
    </nav>

    <div class="l-container--2col">
        <div class="l-sidebar u-dn-sp">
            <ul class="p-list {{ $class ?? '' }}">
                <li class="c-text p-list__item--header">メニュー</li>
                <li class="p-list__item"><a class="c-text p-list__itemInner" href="{{ route('front.user.edit') }}">ユーザー情報編集</a>
                </li>
                <li class="p-list__item"><a class="c-text p-list__itemInner" href="{{ route('password.request') }}">パスワード変更</a>
                </li>
                <li class="p-list__item"><a class="c-text p-list__itemInner" href="{{ route('email.request') }}">メールアドレス変更</a>
                </li>
                <li class="p-list__item"><a class="c-text p-list__itemInner"
                                            href="{{ route('front.user.skill.form') }}">スキル編集</a></li>
                <li class="p-list__item"><a class="c-text p-list__itemInner"
                                            href="{{ route('front.user.delete.form') }}">退会</a></li>
            </ul>
        </div>
        <div class="l-main">
            <div class="p-mainItem">
                <h2 class="p-level2Heading">パスワード変更</h2>
                <p class="c-text u-mt-20">入力いただいたアドレスへ、変更のご案内をお送りしました。</p>
            </div>
        </div>
    </div>

    @include('front.footer.footer')
@endsection
