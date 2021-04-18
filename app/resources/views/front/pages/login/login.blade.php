@extends('front.layout')

@section('title', 'ログイン画面|Aegis')

@section('body')
    @component('front.header.header', ['href' => route('front.index')])
        @include('front.header._link_login_logout')
    @endcomponent
    <div class="Container mt-30">
      <div class="Login">
        <img class="Login__logo" src="{{ asset('images/logo/aegis.svg') }}" alt="">
        <p class="Login__topText">ログイン画面</p>
        <form action="{{ route('login') }}" method="POST">
          {{ csrf_field() }}
          @error('email')
          <p class="Login_error">{{ $message }}</p>
          @enderror
          <div class="LoginIconInput">
            <div class="IconInput">
              <img src="{{ asset('images/icons/icon_lock.png') }}">
              <input name="email" type="text" placeholder="example.email.com">
            </div>
          </div>
          <div class="LoginIconInput">
            <div class="IconInput">
              <img src="{{ asset('images/icons/icon_mail.png') }}">
              <input name="password" type="password" placeholder="パスワードを入力">
            </div>
            <p class="LoginIconInput__caption">半角英数字8文字以上</p>
          </div>
            <div>
                @include('atoms.RegularCheckbox', ['class' => 'mr-10 mb-10 w-200px', 'text' => __('Remember me'), 'id' => 'remember_me', 'name' => 'remember'])
            </div>
          <button type="submit" class="RegularBtn">ログイン</button>
        </form>
        <div class="Login__footWrap">
          <a class="RegularLink" href="/">パスワードを忘れた方へ</a>
          <a class="RegularLink" href="/">ユーザー登録</a>
        </div>
      </div>
    </div>

    @include('front.footer.footer')
@endsection
