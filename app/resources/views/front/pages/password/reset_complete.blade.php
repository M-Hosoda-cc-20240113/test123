@extends('front.layout')

@section('title', 'パスワード再設定|Aegis')

@section('body')
  @component('front.header.header', ['href' => route('front.index')])
    @include('front.header._link_mypage')
    @include('front.header._link_login_logout')
  @endcomponent
  <div class="l-container">
      <div class="l-main">
          <p class="c-text--center">パスワードの再設定が完了しました。<br class="u-dn-pc">新しいパスワードでログインしてください。</p>
          <a href="{{ route('login') }}" class="c-button u-mt-20 u-db u-m0a u-w-30-pc">ログインページへ</a>
      </div>
  </div>

  @include('front.footer.footer')
@endsection
