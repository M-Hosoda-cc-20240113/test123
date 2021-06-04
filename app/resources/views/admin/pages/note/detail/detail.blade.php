@php
  /**
   * @var \App\Services\Note\AdminNoteDetail\NoteDetailResponse $response
   */
@endphp
@extends('admin.layout')

@section('title', '案件詳細|Aegis')

@section('body')
  @component('admin.header.header', ['href' => route('admin.index')])
    @include('admin.header._link_front_top')
    @include('admin.header._link_mypage')
    @include('admin.header._link_login_logout')
  @endcomponent

  @include('admin.pages._drawer_contents')

  @include('admin.footer.footer')
@endsection
