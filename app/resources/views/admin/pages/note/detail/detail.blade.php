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

  <div class="l-container">
    @include('admin.bread_crumb._BreadCrumb')
    <div class="l-main u-mt-20">
      <div class="p-mainItem">
        <h2 class="p-level2Heading">{{ $response->getNote()->title ?? '' }}</h2>
        <p class="u-text u-mt-20 u-fs-16">{{ $response->getNote()->contents ?? '' }}</p>
        <a class="c-button u-db u-m0a u-w-30-pc u-mt-50"
           href="{{ route('note.edit.form', ['note_id' => $response->getNote()->id]) }}">編集</a>
        <form action="{{ route('note.delete') }}" method="post">
          {{ @csrf_field() }}
          <input type="hidden" name="note_id" value="{{ $response->getNote()->id }}">
          <button type="submit" class="c-button--warning u-db u-m0a u-w-30-pc u-mt-20 js-alert-button">削除</button>
        </form>
      </div>
    </div>
  </div>


  @include('admin.footer.footer')
@endsection
