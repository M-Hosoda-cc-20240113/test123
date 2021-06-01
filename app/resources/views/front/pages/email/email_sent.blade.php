@extends('front.layout')

@section('title', 'メールアドレス変更|Aegis')

@section('body')
    @component('front.header.header', ['href' => route('front.index')])
        @include('front.header._link_admin_top')
        @include('front.header._link_mypage')
        @include('front.header._link_login_logout')
    @endcomponent

    @include('front.pages._drawer_contents')

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

    @if(!Auth::getUser()->is_admin)
        @include('front.footer.footer')
    @else
        @include('admin.footer.footer')
    @endif
@endsection
