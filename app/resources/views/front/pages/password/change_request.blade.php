@extends('front.layout')

@section('title', 'トップページ|Aegis')

@section('body')
    @component('front.header.header', ['href' => route('front.index')])
        @include('front.header._link_mypage')
        @include('front.header._link_login_logout')
    @endcomponent
    <div class="l-container--2col">
        <div class="l-sidebar">
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
                <p class="c-text u-mt-20">メールアドレスへパスワード変更の案内を送ります。</p>
                <form action="{{ route('password.email') }}" method="post">
                    {{ csrf_field() }}
                    <input class="c-input--light" type="email" placeholder="メールアドレス入力欄" name="email">
                    <button type="submit" class="c-button u-mt-20">案内メールを送信</button>
                </form>
            </div>
        </div>
    </div>

    @include('front.footer.footer')
@endsection
