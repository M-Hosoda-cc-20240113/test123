@extends('front.layout')

@section('title', 'トップページ|Aegis')

@section('body')
  @component('front.header.header', ['href' => route('front.index')])
    @include('front.header._link_mypage')
    @include('front.header._link_login_logout')
  @endcomponent
  <div class="Container mt-30">
    <p>メールアドレスへパスワード再設定の案内を送ります。</p>
    <form action="{{ route('password.email') }}" method="post">
      {{ csrf_field() }}
      @include('atoms.Input', [ 'text' => 'mail', 'name' => 'email', 'type' => 'email', 'placeholder' => 'メールアドレス入力欄 ', 'class' => 'mt-10 w-60'])
      <button type="submit" class="RegularBtn w-30">案内メールを送信</button>
    </form>
  </div>

  @include('front.footer.footer')
@endsection
