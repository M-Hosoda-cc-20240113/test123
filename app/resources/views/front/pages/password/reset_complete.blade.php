@extends('front.layout')

@section('title', 'パスワード再設定|Aegis')

@section('body')
  @component('front.header.header', ['href' => route('front.index')])
    @include('front.header._link_mypage')
    @include('front.header._link_login_logout')
  @endcomponent
  <div class="l-container">
      <div class="l-main">
          <p>パスワードの再設定が完了しました。<br class="u-dn-pc">新しいパスワードでログインしてください。</p>
          @include('atoms.RegularBtn', ['link' => route('login'), 'text' => 'ログインページへ', 'class' => 'w-30'])
          <a href="" class="c-button u-mt-20 u-db u-m0a u-w-30-pc">ログインページへ</a>
      </div>
  </div>

  @include('front.footer.footer')
@endsection
