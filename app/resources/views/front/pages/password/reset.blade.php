@extends('front.layout')

@section('title', 'パスワード再設定|Aegis')

@section('body')
  @component('front.header.header', ['href' => route('front.index')])
    @include('front.header._link_mypage')
    @include('front.header._link_login_logout')
  @endcomponent

  @include('front.pages._drawer_contents')

  <div class="l-container">
    <form action="{{ route('password.request') }}" method="post">
      {{ csrf_field() }}
      <input type="hidden" name="token" value="{{ $token }}">
      <input type="hidden" name="token2" value="{{ $token2 }}">
      <p class="c-text">パスワードの再設定を行います。新しいパスワードを入力してください。</p>
      <p class="c-text">半角8文字以上、英字大文字、英字小文字、数字を全て含むパスワードを入力してください。</p>
      @foreach($errors->all() as $error)
        <p class="c-text--warning">{{ $error }}</p>
      @endforeach
      <input class="c-input--light u-mt-20" type="password" name="password" placeholder="パスワード入力欄">
      <input class="c-input--light u-mt-10" type="password" name="password_confirmation" placeholder="パスワード入力欄(確認)">
      <button type="submit" class="c-button u-mt-20">再設定する</button>
    </form>
  </div>

  @if(Auth::getUser()->is_admin ?? false)
      @include('admin.footer.footer')
  @else
      @include('front.footer.footer')
  @endif
@endsection
