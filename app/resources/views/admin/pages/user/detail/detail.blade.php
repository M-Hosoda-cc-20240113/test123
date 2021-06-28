@php
  /**
   * @var \App\Services\AdminUser\UserDetail\UserDetailResponse $response
   */
@endphp
@extends('admin.layout')

@section('title', 'ユーザー詳細|Aegis')

@section('body')
  @component('admin.header.header', ['href' => route('admin.index')])
    @include('admin.header._link_front_top')
    @include('admin.header._link_mypage')
    @include('admin.header._link_login_logout')
  @endcomponent
  @include('admin.pages._drawer_contents')

  <div class="l-container">
    <div class="l-main">
      @include('admin.bread_crumb._BreadCrumb')
      <div class="p-mainItem u-mt-20">
        <h2 class="p-level2Heading">{{ $response->getUser()->sei  }}
          &nbsp;{{ $response->getUser()->mei }}　ID：{{ $response->getUser()->id }} 　{{ $response->getUser()->is_new ? '※新規ユーザー' : '' }}</h2>
        @include('admin.pages.user.detail._UserDetailTable', ['response' => $response])
        <a class="c-button u-db u-w-15-pc u-m0a u-mt-20"
           href="{{ route('user.edit.form', ['user_id' => $response->getUser()->id]) }}">編集</a>
        <form action="{{ route('user.delete') }}" method="post">
          {{ @csrf_field() }}
          <input type="hidden" name="user_id" value="{{ $response->getUser()->id }}">
          <button type="submit" class="c-button--warning u-db u-m0a u-w-15-pc u-mt-10 js-alert-button">強制退会</button>
        </form>
      </div>
    </div>
  </div>
  @include('admin.footer.footer')
@endsection
