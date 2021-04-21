@php
  /**
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
      <p class="p-level2Heading">スキル情報編集</p>

      @if($errors->any())
        @foreach($errors->all() as $error)
          <p class="c-text--warning">{{ $error }}</p>
        @endforeach
      @endif

      <form action="{{ route('front.user.skill.edit') }}" method="post">
        {{ @csrf_field() }}

        <button type="submit" class="c-button u-db u-m0a u-mt-20">更新する</button>
      </form>

    </div>
    {{--  l-main  --}}
  </div>

  @include('front.footer.footer')
@endsection
