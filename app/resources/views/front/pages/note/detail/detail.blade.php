@php
  /**
   * @var \App\Services\Note\NoteDetail\NoteDetailResponse $response
   */
@endphp
@extends('front.layout')

@section('title', 'お知らせ|Aegis')

@section('body')
  @component('front.header.header', ['href' => route('front.index')])
    @include('front.header._link_admin_top')
    @include('front.header._link_mypage')
    @include('front.header._link_login_logout')
  @endcomponent
  @include('front.pages._drawer_contents')
  <div class="l-container">
    <div class="l-main">
      <div class="p-mainItem">
        <h2 class="p-level2Heading">{{ $response->getNote()->title ?? '' }}<span class="u-ml-30 u-w-auto">{{ ViewHelper::YmdReplace($response->getNote()->created_at ?? '' )}}</span></h2>
        @include('front.pages.note.detail._NoteDetail', ['response' => $response])
      </div>
    </div>
  </div>

  @include('front.footer.footer')
@endsection
