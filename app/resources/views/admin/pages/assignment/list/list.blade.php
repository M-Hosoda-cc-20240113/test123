@php
  /**
   * @var \App\Services\Assignment\AssignmentList\AssignmentListResponse $response
   */
@endphp

@extends('admin.layout')

@section('title', '稼働状況一覧|Aegis')

@section('body')
  @component('admin.header.header', ['href' => route('front.index')])
    @include('admin.header._link_front_top')
    @include('admin.header._link_mypage')
    @include('admin.header._link_login_logout')
  @endcomponent

  @include('admin.pages._drawer_contents')

  <div class="l-container">
    @include('admin.bread_crumb._BreadCrumb')
    @include('admin.pages.assignment.list._AssignmentTable', ['response' => $response])
    {{ $response->getAssignments()->links('components.paginator') }}
  </div>
  @include('admin.footer.footer')
@endsection
