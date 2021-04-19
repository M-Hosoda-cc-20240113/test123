@extends('front.layout2')

@section('title', 'トップページ|Aegis')

@section('body')
  <div class="l-header">
    @component('organisms.Header')
      @auth
        <li class="c-text--bold p-nav__item">
          <a class="c-text--bold" href=""
             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            ログアウト
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="post">
            {{ csrf_field() }}
          </form>
        </li>
      @endauth
      @guest
        <li class="c-text--bold p-nav__item">ログアウト</li>
      @endguest
    @endcomponent
  </div>
  <div class="l-container">
    <div class="p-userRegisterUnit">
      <div class="p-userRegister__row">
        <span class="c-text--bold p-userRegister__title u-mb-10-sp">氏名</span>
        <div class="p-userRegister__inputUnitWrap--2col">
          <div class="p-userRegister__inputUnit">
            <span class="c-text p-userRegister__inputName">姓</span>
            <input class="c-input p-userRegister__input" type="text" placeholder="田中">
          </div>
          <div class="p-userRegister__inputUnit">
            <span class="c-text p-userRegister__inputName">名</span>
            <input class="c-input p-userRegister__input" type="text" placeholder="一郎">
          </div>
        </div>
      </div>
      {{--   p-userRegisterRow   --}}

      <div class="p-userRegister__row">
        <span class="c-text--bold p-userRegister__title u-mb-10-sp">フリガナ</span>
        <div class="p-userRegister__inputUnitWrap--2col">
          <div class="p-userRegister__inputUnit">
            <span class="c-text p-userRegister__inputName">セイ</span>
            <input class="c-input p-userRegister__input" type="text" placeholder="タナカ">
          </div>
          <div class="p-userRegister__inputUnit">
            <span class="c-text p-userRegister__inputName">メイ</span>
            <input class="c-input p-userRegister__input" type="text" placeholder="イチロウ">
          </div>
        </div>
      </div>
      {{--   p-userRegisterRow   --}}

      <div class="p-userRegister__row">
        <span class="c-text--bold p-userRegister__title u-mb-10-sp">生年月日</span>
        <div class="p-userRegister__inputUnitWrap">
          <div class="p-userRegister__inputUnit--single u-w-50-pc">
            <input class="c-input p-userRegister__input u-w-100-sp" type="text" placeholder="19930808">
          </div>
        </div>
      </div>
      {{--   p-userRegisterRow   --}}

      <div class="p-userRegister__row">
        <span class="c-text--bold p-userRegister__title u-mb-10-sp">メールアドレス</span>
        <div class="p-userRegister__inputUnitWrap">
          <div class="p-userRegister__inputUnit--single u-w-50-pc">
            <input class="c-input p-userRegister__input u-w-100-sp" type="text" placeholder="mail@example.com">
          </div>
        </div>
      </div>
      {{--   p-userRegisterRow   --}}

      <div class="p-userRegister__row">
        <span class="c-text--bold p-userRegister__title u-mb-10-sp">電話番号</span>
        <div class="p-userRegister__inputUnitWrap">
          <div class="p-userRegister__inputUnit--single u-w-50-pc">
            <input class="c-input p-userRegister__input u-w-100-sp" type="text" placeholder="08012345678(ハイフン不要)">
          </div>
        </div>
      </div>
      {{--   p-userRegisterRow   --}}

      <div class="p-userRegister__row">
        <span class="c-text--bold p-userRegister__title u-mb-10-sp">パスワード</span>
        <div class="p-userRegister__inputUnitWrap">
          <div class="p-userRegister__inputUnit--single u-w-50-pc">
            <input class="c-input p-userRegister__input u-w-100-sp" type="password" placeholder="">
          </div>
        </div>
      </div>
      {{--   p-userRegisterRow   --}}
    </div>
  </div>
@endsection
