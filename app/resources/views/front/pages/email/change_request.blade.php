@extends('front.layout')

@section('title', 'メールアドレス変更 |【Aegis(イージス)】フリーランス・ITエンジニアのための案件サイト')

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
        <h2 class="p-level2Heading">メールアドレス変更</h2>
        <p class="c-text u-mt-20">変更したいメールアドレスへ再設定の案内を送ります。</p>
        @if($errors->any())
          @foreach($errors->all() as $error)
            <p class="c-text--warning">{{ $error }}</p>
          @endforeach
        @endif
        <form action="{{ route('email.sendEmail') }}" method="post">
          {{ csrf_field() }}
          <input class="c-input--light u-mt-10" type="email" placeholder="メールアドレス入力欄" name="email" value="{{ old('email') }}">
          <button type="submit" class="c-button u-mt-20 js-loading-button">案内メールを送信</button>
        </form>
      </div>
    </div>
  </div>

  @if(!Auth::getUser()->is_admin)
    @include('front.footer.footer')
  @else
    @include('admin.footer.footer')
  @endif
@endsection
