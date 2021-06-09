@extends('front.layout')

@section('title', '利用規約|Aegis')

@section('body')
  @component('front.header.header', ['href' => route('front.index')])
    @include('front.header._link_admin_top')
    @include('front.header._link_mypage')
    @include('front.header._link_login_logout')
  @endcomponent
  @include('front.pages._drawer_contents')
  @include('front.pages._loader')

  <div class="l-container">
    <div class="l-main">
      <div class="p-mainItem u-mt-20">
        <h1 class="p-level2Heading c-text--center">利用規約</h1>
      </div>
    </div>
  </div>

  @include('front.footer.footer')
@endsection
