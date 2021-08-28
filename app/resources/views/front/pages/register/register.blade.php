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

        <h2 class="p-level2Heading">新規登録情報入力</h2>
        <div class="p-userRegister">
          <form action="{{ route('auth.register') }}" method="post">
            {{ @csrf_field() }}
            <div class="p-userRegister__row">
              <span class="c-text--bold p-userRegister__title u-mb-5-sp">氏名<span
                        class="c-label--warning c-label--rounded c-label--sm u-ml-10">必須</span></span>
              <div class="p-userRegister__inputUnitWrap--2col">
                <div class="p-userRegister__inputUnit">
                  <span class="c-text p-userRegister__inputName">姓</span>
                  <div class="u-df u-ff-column u-w-100">
                    @if($errors->has('sei'))
                      @foreach($errors->get('sei') as $error)
                        <p class="c-text--warning fs-11">{{ $error }}</p>
                      @endforeach
                    @endif
                    <input class="c-input p-userRegister__input" type="text" placeholder="田中" name="sei"
                           value="{{ old('sei') }}">
                  </div>
                </div>
                <div class="p-userRegister__inputUnit">
                  <span class="c-text p-userRegister__inputName">名</span>
                  <div class="u-df u-ff-column u-w-100">
                    @if($errors->has('mei'))
                      @foreach($errors->get('mei') as $error)
                        <p class="c-text--warning fs-11">{{ $error }}</p>
                      @endforeach
                    @endif
                    <input class="c-input p-userRegister__input" type="text" placeholder="一郎" name="mei"
                           value="{{ old('mei') }}">
                  </div>
                </div>
              </div>
            </div>
            {{--   p-userRegisterRow   --}}

            <div class="p-userRegister__row">
              <span class="c-text--bold p-userRegister__title u-mb-5-sp">フリガナ<span
                        class="c-label--warning c-label--rounded c-label--sm u-ml-10">必須</span></span>
              <div class="p-userRegister__inputUnitWrap--2col">
                <div class="p-userRegister__inputUnit">
                  <span class="c-text p-userRegister__inputName">セイ</span>
                  <div class="u-df u-ff-column u-w-100">
                    @if($errors->has('sei_kana'))
                      @foreach($errors->get('sei_kana') as $error)
                        <p class="c-text--warning fs-11">{{ $error }}</p>
                      @endforeach
                    @endif
                    <input class="c-input p-userRegister__input" type="text" placeholder="タナカ"
                           name="sei_kana"
                           value="{{ old('sei_kana') }}">
                  </div>
                </div>
                <div class="p-userRegister__inputUnit">
                  <span class="c-text p-userRegister__inputName">メイ</span>
                  <div class="u-df u-ff-column u-w-100">
                    @if($errors->has('mei_kana'))
                      @foreach($errors->get('mei_kana') as $error)
                        <p class="c-text--warning fs-11">{{ $error }}</p>
                      @endforeach
                    @endif
                    <input class="c-input p-userRegister__input" type="text" placeholder="イチロウ"
                           name="mei_kana"
                           value="{{ old('mei_kana') }}">
                  </div>
                </div>
              </div>
            </div>
            {{--   p-userRegisterRow   --}}

            <div class="p-userRegister__row">
              <span class="c-text--bold p-userRegister__title u-mb-5-sp">生年月日<span
                        class="c-label--warning c-label--rounded c-label--sm u-ml-10">必須</span></span>
              <div class="p-userRegister__inputUnitWrap">
                <div class="p-userRegister__inputUnit--single u-w-50-pc u-df u-ff-column">
                  @if($errors->has('birthday'))
                    @foreach($errors->get('birthday') as $error)
                      <p class="c-text--warning fs-11">{{ $error }}</p>
                    @endforeach
                  @endif
                  <input class="c-input p-userRegister__input u-w-100-sp" type="date"
                         name="birthday" value="{{ old('birthday') }}">
                </div>
              </div>
            </div>
            {{--   p-userRegisterRow   --}}

            <div class="p-userRegister__row">
              <span class="c-text--bold p-userRegister__title u-mb-5-sp">メールアドレス<span
                        class="c-label--warning c-label--rounded c-label--sm u-ml-10">必須</span></span>
              <div class="p-userRegister__inputUnitWrap">
                <div class="p-userRegister__inputUnit--single u-w-50-pc u-df u-ff-column">
                  @if($errors->has('email'))
                    @foreach($errors->get('email') as $error)
                      <p class="c-text--warning fs-11">{{ $error }}</p>
                    @endforeach
                  @endif
                  <input class="c-input p-userRegister__input u-w-100-sp" type="email"
                         placeholder="mail@example.com"
                         name="email" value="{{ old('email') }}">
                </div>
              </div>
            </div>
            {{--   p-userRegisterRow   --}}

            <div class="p-userRegister__row">
              <span class="c-text--bold p-userRegister__title u-mb-5-sp">電話番号<span
                        class="c-label--warning c-label--rounded c-label--sm u-ml-10">必須</span></span>
              <div class="p-userRegister__inputUnitWrap">
                <div class="p-userRegister__inputUnit--single u-w-50-pc u-df u-ff-column">
                  @if($errors->has('tel'))
                    @foreach($errors->get('tel') as $error)
                      <p class="c-text--warning fs-11">{{ $error }}</p>
                    @endforeach
                  @endif
                  <input class="c-input p-userRegister__input u-w-100-sp" type="text"
                         placeholder="08012345678(ハイフン不要)"
                         name="tel" value="{{ old('tel') }}">
                </div>
              </div>
            </div>
            {{--   p-userRegisterRow   --}}

            <div class="p-userRegister__row">
              <span class="c-text--bold p-userRegister__title u-mb-5-sp">希望連絡時間帯</span>
              <div class="p-userRegister__inputUnitWrap">
                <div class="p-userRegister__inputUnit--single u-w-50-pc u-df u-ff-column">
                  @if($errors->has('contact_time'))
                    @foreach($errors->get('contact_time') as $error)
                      <p class="c-text--warning fs-11">{{ $error }}</p>
                    @endforeach
                  @endif
                  <textarea class="c-input p-userRegister__input u-w-100-sp" autocomplete="on" placeholder="平日　10:00~18:00"
                            name="contact_time"  rows="4" cols="40">{{ old('contact_time') }}</textarea>
                </div>
              </div>
            </div>

            {{--   p-userRegisterRow   --}}

            <div class="p-userRegister__row">
              <span class="c-text--bold p-userRegister__title u-mb-5-sp">招待コード</span>
              <div class="p-userRegister__inputUnitWrap">
                <div class="p-userRegister__inputUnit--single u-w-50-pc u-df u-ff-column">
                  @if($errors->has('invite_user_code'))
                    @foreach($errors->get('invite_user_code') as $error)
                      <p class="c-text--warning fs-11">{{ $error }}</p>
                    @endforeach
                  @endif
                  <input class="c-input p-userRegister__input u-w-100-sp" type="text"
                         name="invite_user_code" value="{{ old('invite_user_code') }}">
                </div>
              </div>
            </div>
            {{--   p-userRegisterRow   --}}

            <div class="p-userRegister__row u-mb-5">
              <span class="c-text--bold p-userRegister__title u-mb-5-sp">パスワード<span
                        class="c-label--warning c-label--rounded c-label--sm u-ml-10">必須</span></span>
              <div class="p-userRegister__inputUnitWrap">
                <div class="p-userRegister__inputUnit--single u-w-50-pc u-df u-ff-column">
                  @if($errors->has('password'))
                    @foreach($errors->get('password') as $error)
                      <p class="c-text--warning fs-11">{{ $error }}</p>
                    @endforeach
                  @endif
                  <input class="c-input p-userRegister__input u-w-100-sp" type="password"
                         placeholder="" name="password"
                         value="{{ old('password') }}">
                </div>
              </div>
            </div>
            <p class="c-text u-fs-12">※半角英数字8文字以上で大文字を1つ以上含むパスワードを入力してください。</p>

            <label class="p-checkbox u-fs-14 u-mt-20">
              <p><a class="c-text--primary" target="_blank" rel="noopener noreferrer"
                    href="{{ route('feature.policy') }}">利用規約</a>・<a class="c-text--primary" target="_blank"
                                                                     rel="noopener noreferrer"
                                                                     href="{{ route('feature.privacy.policy') }}">個人情報の取扱い</a>に同意します。<span
                        class="c-label--warning c-label--rounded c-label--sm u-ml-10">必須</span>
              </p>
              <input name="policy" type="checkbox">
              <div class="p-checkbox__indicator"></div>
            </label>
            @if($errors->has('policy'))
              @foreach($errors->get('policy') as $error)
                <p class="c-text--warning fs-11">{{ $error }}</p>
              @endforeach
            @endif
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
