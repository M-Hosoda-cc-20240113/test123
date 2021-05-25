@php
/**
 * @var \App\Services\Contact\ShowContactForm\ShowContactFormResponse $response
 */
@endphp

@extends('front.layout')

@section('title', 'お問い合わせ|Aegis')
@section('head')
  <script src="https://sdk.form.run/js/v2/formrun.js"></script>
@endsection

@section('body')
  @component('front.header.header', ['href' => route('front.index')])
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
        <h2 class="p-level2Heading">お問い合わせ</h2>
        @if($errors->any())
          @foreach($errors->all() as $error)
            <p class="c-text--warning">{{ $error }}</p>
          @endforeach
        @endif
        @include('front.pages.contact._formrun', ['response' => $response])
      </div>
    </div>
  </div>

  @include('front.footer.footer')
@endsection
