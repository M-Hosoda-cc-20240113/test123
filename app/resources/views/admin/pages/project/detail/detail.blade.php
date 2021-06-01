@php
  /**
   * @var \App\Services\AdminProject\ProjectDetail\ProjectDetailResponse $response
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
    <div class="l-main">
      @include('admin.bread_crumb._BreadCrumb')
      <div class="p-mainItem u-mt-20">
        @if($errors->all())
          @foreach($errors->all() as $error)
            <p class="c-text--warning">{{ $error }}</p>
          @endforeach
        @endif
        <h2
          class="p-level2Heading">{{ $response->getProject()->name ?? '' }}{{ $response->getProject()->decided ? '※応募終了' : '' }}</h2>
        @include('admin.pages.project.detail._ProjectDetailTable', ['response' => $response])

        @if(!\App\Models\Project::can_delete($response->getProject()->id))
          <h3 class="p-level2Heading u-mt-40">応募ユーザー</h3>
          @if($response->getProject()->user_app->count() === 0)
            <p class="u-text u-mt-20 u-fs-16">※応募しているユーザーはいません。</p>
          @else
            @include('admin.pages.project.detail._AppUserList', ['response' => $response])
          @endif
          <h3 class="p-level2Heading u-mt-40">稼働ユーザー</h3>
          @if($response->getProject()->user_assign->count() === 0)
            <p class="u-text u-mt-20 u-fs-16">※稼働しているユーザーはいません。</p>
          @else
            @include('admin.pages.project.detail._AssignUserList', ['response' => $response])
          @endif
        @endif

        <a class="c-button u-db u-m0a u-w-30-pc u-mt-50"
           href="{{ route('project.edit.form', ['project_id' => $response->getProject()->id]) }}">編集</a>
        {{--   編集  --}}

        <form action="{{ route('project.toggle') }}" method="POST">
          {{ @csrf_field() }}
          <input type="hidden" name="project_id" value="{{ $response->getProject()->id }}">
          <button type="submit"
                  class="c-button u-db u-m0a u-w-30-pc u-mt-10">{{ $response->getProject()->decided ? '応募開始' : '応募終了' }}</button>
        </form>
        {{--   応募終了  --}}

        @if(\App\Models\Project::can_delete($response->getProject()->id))
          <form action="{{ route('project.delete') }}" method="POST">
            {{ @csrf_field() }}
            <input type="hidden" name="project_id" value="{{ $response->getProject()->id }}">
            <button type="submit" class="c-button--warning u-db u-m0a u-w-30-pc u-mt-10 js-alert-button">
              削除
            </button>
          </form>
        @endif
        {{--   削除  --}}
      </div>
    </div>
  </div>
  @include('admin.footer.footer')
@endsection
