@extends('front.layout')

@section('title', 'パスワード再設定|Aegis')

@section('body')
  @component('front.header.header', ['href' => route('front.index')])
    @include('front.header._link_mypage')
    @include('front.header._link_login_logout')
  @endcomponent
  <div class="Container mt-30">
    <form action="{{ route('password.request') }}" method="post">
      {{ csrf_field() }}
      <input type="hidden" name="token" value="{{ $token }}">
      <input type="hidden" name="token2" value="{{ $token2 }}">
      <p>パスワードの再設定を行います。新しいパスワードを入力してください。</p>
      @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
      @endforeach
      @include('atoms.Input', ['type' => 'password', 'name' => 'password', 'placeholder' => 'パスワード入力欄'])
      @include('atoms.Input', ['type' => 'password', 'name' => 'password_confirmation', 'placeholder' => 'パスワード入力欄(確認)'])
      <button type="submit" class="RegularBtn">再設定する</button>
    </form>
  </div>

  @include('front.footer.footer')
@endsection
