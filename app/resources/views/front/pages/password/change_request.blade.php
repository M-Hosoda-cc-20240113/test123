@extends('front.layout')

@section('title', 'パスワード再設定 ｜'.config('app.title.aegis_explain'))

@section('body')
  @component('front.header.header', ['href' => route('front.index')])
    @include('front.header._link_admin_top')
    @include('front.header._link_mypage')
    @include('front.header._link_login_logout')
  @endcomponent

  @include('front.pages._drawer_contents')
  @include('front.pages._loader')

  <div class="l-container--2col @guest u-jc-center @endguest">
    @auth
      @include('front.pages.mypage._sidebar')
    @endauth
    <div class="l-main">
      <div class="p-mainItem">
        <h2 class="p-level2Heading">パスワード変更</h2>
        <p class="c-text u-mt-20">登録メールアドレスへパスワード変更の案内を送ります。</p>
        @if($errors->any())
          @foreach($errors->all() as $error)
            <p class="c-text--warning">{{ $error }}</p>
          @endforeach
        @endif
        @if ( Auth::check() )
          <form action="{{ route('password.email') }}" method="post">
            {{ csrf_field() }}
            <input class="c-input--light u-mt-10" type="hidden" name="email" value="{{ Auth::getUser()->email }}">
            <button type="submit" class="c-button u-mt-20 js-loading-button">案内メールを送信</button>
          </form>
        @else
          <form action="{{ route('password.email') }}" method="post">
            {{ csrf_field() }}
            <input class="c-input--light u-mt-10" type="email" placeholder="メールアドレス入力欄" name="email"
                   value="{{ old("email") }}">
            <button type="submit" class="c-button u-mt-20 js-loading-button">案内メールを送信</button>
          </form>
        @endif
      </div>
    </div>
  </div>

  @if(Auth::getUser()->is_admin ?? false)
    @include('admin.footer.footer')
  @else
    @include('front.footer.footer')
  @endif
@endsection
