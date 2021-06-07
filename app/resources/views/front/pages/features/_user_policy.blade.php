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
        <p class="u-fs-24 u-mt-10">第１条</p>
        <ul class="u-fs-16 u-mt-5">
          <li>1.</li>
          <li>2.</li>
          <li>3.</li>
        </ul>
        <p class="u-fs-24 u-mt-10">第２条</p>
        <ul class="u-fs-16 u-mt-5">
          <li>1.</li>
          <li>2.</li>
          <li>3.</li>
        </ul>
        <p class="u-fs-24 u-mt-10">第３条</p>
        <ul class="u-fs-16 u-mt-5">
          <li>1.</li>
          <li>2.</li>
          <li>3.</li>
        </ul>
      </div>
    </div>
  </div>

  @include('front.footer.footer')
@endsection