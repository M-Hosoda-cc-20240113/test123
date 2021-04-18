@extends('front.layout')

@section('title', 'パスワード再設定|Aegis')

@section('body')
  @component('front.header.header', ['href' => route('front.index')])
    @include('front.header._link_mypage')
    @include('front.header._link_login_logout')
  @endcomponent
  <div class="Container mt-30">
    <p>パスワードの再設定が完了しました。<br>新しいパスワードでログインしてください。</p>
    @include('atoms.RegularBtn', ['link' => route('login'), 'text' => 'ログインページへ', 'class' => 'w-30'])
  </div>

  @include('front.footer.footer')
@endsection
