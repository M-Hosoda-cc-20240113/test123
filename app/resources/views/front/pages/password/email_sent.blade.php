@extends('front.layout')

@section('title', 'パスワード再設定|Aegis')

@section('body')
  @component('front.header.header', ['href' => route('front.index')])
    @include('front.header._link_mypage')
    @include('front.header._link_login_logout')
  @endcomponent
  <div class="Container mt-30">
    <p>入力いただいたアドレスへ、変更のご案内をお送りしました。</p>
  </div>

  @include('front.footer.footer')
@endsection
