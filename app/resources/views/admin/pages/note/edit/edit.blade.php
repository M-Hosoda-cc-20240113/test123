@php
  /**
   * @var \App\Services\Note\ShowEditNoteForm\ShowEditNoteFormResponse $response
   */
@endphp
@extends('front.layout')
@section('title', 'お知らせ修正|Aegis')

@section('body')
  @component('admin.header.header', ['href' => route('admin.index')])
    @include('admin.header._link_front_top')
    @include('admin.header._link_mypage')
    @include('admin.header._link_login_logout')
  @endcomponent
  @include('admin.pages._drawer_contents')

  <div class="l-container">
    @include('admin.bread_crumb._BreadCrumb')
    <div class="l-main">
      <div class="p-mainItem">

        <h2 class="p-level2Heading">お知らせ修正</h2>
        @if($errors->all())
          @foreach($errors->all() as $error)
            <p class="c-text--warning">{{ $error }}</p>
          @endforeach
        @endif

        <div class="p-register">
          <form action="{{ route('note.edit') }}" method="post">
            {{ @csrf_field() }}
            <input type="hidden" name="note_id" value="{{ $response->getNote()->id }}">

            <div class="p-register__row">
              <span class="p-register__title c-text--bold">お知らせタイトル</span>
              <div class="p-register__itemWrap">
                <div class="p-register__item u-w-50-pc">
                  <input name="title" class="c-input" type="text" value="{{  $response->getNote()->title ?? '' }}">
                </div>
              </div>
            </div>
            {{--  お知らせタイトル  --}}

            <div class="p-register__row--spColumn">
              <p class="p-register__title c-text--bold u-w-100-sp">お知らせ詳細</p>
              <div class="p-register__itemWrap">
                <div class="p-register__item">
                            <textarea class="c-input--light"
                                      name="contents"
                                      id=""
                                      rows="10">{{ $response->getNote()->contents ?? '' }}</textarea>
                </div>
              </div>
            </div>
            {{--  お知らせ詳細  --}}

            <button type="submit" class="c-button u-db u-m0a u-w-250px u-mb-20">登録</button>
          </form>
        </div>
        {{--  p-register  --}}
      </div>
    </div>
    {{--   l-main  --}}
  </div>

  @include('admin.footer.footer')
@endsection
