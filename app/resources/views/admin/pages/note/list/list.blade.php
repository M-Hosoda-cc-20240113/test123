@php
  /**
   * @var \App\Services\Note\NoteList\NoteListResponse $response
   */
@endphp

@extends('admin.layout')

@section('title', 'お知らせ一覧|Aegis')

@section('body')
  @component('admin.header.header', ['href' => route('admin.index')])
    @include('admin.header._link_front_top')
    @include('admin.header._link_mypage')
    @include('admin.header._link_login_logout')
  @endcomponent
  @include('admin.pages._drawer_contents')

  <div class="l-container">
    @include('admin.bread_crumb._BreadCrumb')
    <a href="{{ route('note.create.form') }}" class="c-button u-ml-10 u-w-auto u-mt-20">新規登録</a>
    @include('admin.pages.note.list._NoteTable', ['response' => $response])
    {{ $response->getNotes()->links('components.paginator') }}
  </div>

  @include('admin.footer.footer')
@endsection
