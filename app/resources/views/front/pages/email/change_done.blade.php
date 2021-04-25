@extends('front.layout')

@section('title', 'メールアドレス変更|Aegis')

@section('body')
    @component('front.header.header', ['href' => route('front.index')])
        @include('front.header._link_mypage')
        @include('front.header._link_login_logout')
    @endcomponent
    <div class="Container mt-30">
        <p>メールアドレスの変更が完了しました。</p>
        <a href="{{ route('login') }}" class="c-button">ログイン</a>
    </div>

    @include('front.footer.footer')
@endsection
