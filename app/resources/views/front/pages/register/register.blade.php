@extends('front.layout')

@section('title', '新規登録 ｜'.config('app.title.aegis_explain'))

@section('body')
  @component('front.header.header', ['href' => route('front.index')])
    @include('front.header._link_mypage')
    @include('front.header._link_login_logout')
  @endcomponent

  @include('front.pages._drawer_contents')
  @include('front.pages._loader')

  <div class="l-container">
    <div class="l-main">
      <div class="p-mainItem">

        <h2 class="p-level2Heading">新規登録情報入力<span class="c-text--warning">（全項目必須）</span></h2>

        @if($errors->all())
          <p class="c-text--bold u-mt-20">以下のエラーを修正してください</p>
          @foreach($errors->all() as $error)
            <p class="c-text--warning">{{ $error }}</p>
          @endforeach
        @endif

        <div class="p-userRegister">
          <form action="{{ route('auth.register') }}" method="post">
            {{ @csrf_field() }}
            <div class="p-userRegister__row">
              <span class="c-text--bold p-userRegister__title u-mb-5-sp">氏名</span>
              <div class="p-userRegister__inputUnitWrap--2col">
                <div class="p-userRegister__inputUnit">
                  <span class="c-text p-userRegister__inputName">姓</span>
                  <input class="c-input p-userRegister__input" type="text" placeholder="田中" name="sei"
                         value="{{ old('sei') }}">
                </div>
                <div class="p-userRegister__inputUnit">
                  <span class="c-text p-userRegister__inputName">名</span>
                  <input class="c-input p-userRegister__input" type="text" placeholder="一郎" name="mei"
                         value="{{ old('mei') }}">
                </div>
              </div>
            </div>
            {{--   p-userRegisterRow   --}}

            <div class="p-userRegister__row">
              <span class="c-text--bold p-userRegister__title u-mb-5-sp">フリガナ</span>
              <div class="p-userRegister__inputUnitWrap--2col">
                <div class="p-userRegister__inputUnit">
                  <span class="c-text p-userRegister__inputName">セイ</span>
                  <input class="c-input p-userRegister__input" type="text" placeholder="タナカ"
                         name="sei_kana"
                         value="{{ old('sei_kana') }}">
                </div>
                <div class="p-userRegister__inputUnit">
                  <span class="c-text p-userRegister__inputName">メイ</span>
                  <input class="c-input p-userRegister__input" type="text" placeholder="イチロウ"
                         name="mei_kana"
                         value="{{ old('mei_kana') }}">
                </div>
              </div>
            </div>
            {{--   p-userRegisterRow   --}}

            <div class="p-userRegister__row">
              <span class="c-text--bold p-userRegister__title u-mb-5-sp">生年月日</span>
              <div class="p-userRegister__inputUnitWrap">
                <div class="p-userRegister__inputUnit--single u-w-50-pc">
                  <input class="c-input p-userRegister__input u-w-100-sp" type="number"
                         placeholder="19930808"
                         name="birthday" value="{{ old('birthday') }}">
                </div>
              </div>
            </div>
            {{--   p-userRegisterRow   --}}

            <div class="p-userRegister__row">
              <span class="c-text--bold p-userRegister__title u-mb-5-sp">メールアドレス</span>
              <div class="p-userRegister__inputUnitWrap">
                <div class="p-userRegister__inputUnit--single u-w-50-pc">
                  <input class="c-input p-userRegister__input u-w-100-sp" type="email"
                         placeholder="mail@example.com"
                         name="email" value="{{ old('email') }}">
                </div>
              </div>
            </div>
            {{--   p-userRegisterRow   --}}

            <div class="p-userRegister__row">
              <span class="c-text--bold p-userRegister__title u-mb-5-sp">電話番号</span>
              <div class="p-userRegister__inputUnitWrap">
                <div class="p-userRegister__inputUnit--single u-w-50-pc">
                  <input class="c-input p-userRegister__input u-w-100-sp" type="number"
                         placeholder="08012345678(ハイフン不要)"
                         name="tel" value="{{ old('tel') }}">
                </div>
              </div>
            </div>
            {{--   p-userRegisterRow   --}}

            <div class="p-userRegister__row u-mb-5">
              <span class="c-text--bold p-userRegister__title u-mb-5-sp">パスワード</span>
              <div class="p-userRegister__inputUnitWrap">
                <div class="p-userRegister__inputUnit--single u-w-50-pc">
                  <input class="c-input p-userRegister__input u-w-100-sp" type="password"
                         placeholder="" name="password"
                         value="{{ old('password') }}">
                </div>
              </div>
            </div>
            <p class="c-text u-fs-12">※半角英数字8文字以上で大文字を1つ以上含むパスワードを入力してください。</p>

            <label class="p-checkbox u-fs-14 u-mt-20">
              <p><a class="c-text--primary" target="_blank" rel="noopener noreferrer" href="{{ route('feature.policy') }}">利用規約</a>・<a class="c-text--primary" target="_blank" rel="noopener noreferrer" href="{{ route('feature.privacy.policy') }}">個人情報の取扱い</a>に同意します。</p>
              <input name="policy" type="checkbox">
              <div class="p-checkbox__indicator"></div>
            </label>
            {{--   p-userRegisterRow   --}}
            <input type="hidden" name="project_id" value="{{ $project_id ?? '' }}">
            <button class="c-button u-db u-w-30-pc u-m0a u-mt-20 js-loading-button gtm-register">新規登録</button>
          </form>
        </div>
      </div>

    </div>

  </div>

  @include('front.footer.footer')
@endsection
