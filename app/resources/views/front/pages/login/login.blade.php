@extends('front.layout')

@section('title', 'ログイン画面|Aegis')

@section('body')
    @component('front.header.header', ['href' => route('front.index')])
        @include('front.header._link_login_logout')
    @endcomponent

    @include('front.pages._drawer_contents')
    <div class="c-modal u-db"></div>
    <div class="l-container">
        <div class="l-main">
            <img class="u-db u-m0a u-w-30-pc u-mt-60" src="{{ asset('images/logo/aegis.svg') }}" alt="">
            <p class="c-text--center u-mt-20">ログイン画面</p>
            <form action="{{ route('login') }}" method="post">
                {{ csrf_field() }}
                @error('email')
                <p class="c-text--warning u-w-40-pc u-m0a">{{ $message }}</p>
                @enderror

                <div class="p-iconInput u-mt-30 u-w-40-pc u-m0a">
                    <img src="{{ asset('images/icons/icon_lock.png') }}">
                    <input name="email" type="text" placeholder="example@email.com">
                </div>

                <div class="p-iconInput u-mt-20 u-w-40-pc u-m0a">
                    <img src="{{ asset('images/icons/icon_mail.png') }}">
                    <input name="password" type="password" placeholder="パスワードを入力">
                </div>
                <p class="c-text--muted u-w-40-pc u-m0a u-mt-5">半角英数字8文字以上</p>
                <div class="u-w-40-pc u-m0a u-mt-20">
                    <label class="p-checkbox"><span class="c-text--muted u-fs-14">ログイン状態を保持する</span>
                        <input checked="checked" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                        <div class="p-checkbox__indicator"></div>
                    </label>
                </div>
                <button type="submit" class="c-button u-w-40-pc u-db u-m0a u-mt-20">ログイン</button>
                <div class="u-mt-20 u-m0a u-w-40-pc u-border-top u-pt-20">
                    <a class="c-text--primary u-mr-20" href="{{ route('password.request') }}">パスワードを忘れた方</a>
                    <a class="c-text--primary" href="{{ route('register') }}">ユーザー登録</a>
                </div>
            </form>
        </div>
    </div>

    @include('front.footer.footer')
@endsection
