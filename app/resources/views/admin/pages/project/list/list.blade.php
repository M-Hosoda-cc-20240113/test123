@php
/**
 * @var \App\Services\Admin\Project\ProjectList\ProjectListResponse $response
 */
@endphp

@extends('admin.layout')

@section('title', '案件一覧|Aegis')

@section('body')
    @include('admin.header.header')
    <div class="Container mt-30">
      @include('admin.bread_crumb._BreadCrumb')
      @include('admin.pages.project.list._RegularTable', ['response' => $response])
    </div>

    @include('admin.footer.footer')
@endsection

@section('script')
  @parent
  <script src="{{ asset('/js/bundle.js') }}" type="text/javascript"></script>
@endsection