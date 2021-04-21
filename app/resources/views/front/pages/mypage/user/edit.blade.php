@php
  /**
   * @var \App\Services\User\ShowEditUserForm\ShowEditUserFormResponse $response
   */
@endphp
@extends('front.layout')

@section('title', 'ユーザー情報編集|Aegis')

@section('body')
  @component('front.header.header', ['href' => route('front.index')])
    @include('front.header._link_login_logout')
  @endcomponent
  <div class="l-container--2col">
    <div class="l-sidebar">
      <ul class="p-list {{ $class ?? '' }}">
        <li class="c-text p-list__item--header">メニュー</li>
        <li class="p-list__item"><a class="c-text p-list__itemInner" href="{{ route('front.user.edit') }}">ユーザー情報編集</a>
        </li>
        <li class="p-list__item"><a class="c-text p-list__itemInner" href="{{ route('password.request') }}">パスワード変更</a>
        </li>
        <li class="p-list__item"><a class="c-text p-list__itemInner" href="/">スキル編集</a></li>
      </ul>
    </div>
    {{--  l-sidebar  --}}

    <div class="l-main">
      <p class="p-level2Heading">ユーザー情報編集</p>

      @if($errors->any())
        @foreach($errors->all() as $error)
          <p class="c-text--warning">{{ $error }}</p>
        @endforeach
      @endif

      <form action="{{ route('front.user.edit') }}" method="post">
        {{ @csrf_field() }}
        <div class="p-formGroupUnit--2col">
          <div class="p-formGroup p-formGroupUnit--2col__item">
            <span class="">姓</span>
            <input name="sei" type="text" class="c-input" value="{{ $response->getUser()->sei }}">
          </div>
          <div class="p-formGroup p-formGroupUnit--2col__item">
            <span class="">名</span>
            <input name="mei" type="text" class="c-input" value="{{ $response->getUser()->mei }}">
          </div>
          <div class="p-formGroup p-formGroupUnit--2col__item">
            <span class="">セイ</span>
            <input name="sei_kana" type="text" class="c-input" value="{{ $response->getUser()->sei_kana }}">
          </div>
          <div class="p-formGroup p-formGroupUnit--2col__item">
            <span class="">メイ</span>
            <input name="mei_kana" type="text" class="c-input" value="{{ $response->getUser()->mei_kana }}">
          </div>
          <div class="p-formGroup p-formGroupUnit--2col__item">
            <span class="">電話番号</span>
            <input name="tel" type="number" class="c-input" value="{{ $response->getUser()->tel }}">
          </div>
          <div class="p-formGroup p-formGroupUnit--2col__item">
            <span class="">生年月日</span>
            <input name="birthday" type="number" class="c-input" value="{{ $response->getUser()->birthday }}">
          </div>
        </div>

        <button type="submit" class="c-button u-db u-m0a u-mt-20">更新する</button>
      </form>

    </div>
    {{--  l-main  --}}
  </div>

  @include('front.footer.footer')
@endsection
