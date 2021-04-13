@php
/**
 * @var \App\Services\Admin\Application\ApplicationList\ApplicationListResponse $response
 */
@endphp

@extends('admin.layout')

@section('title', '申し込み状況一覧|Aegis')

@section('body')
    @include('admin.header.header')
    <div class="Container mt-30">
      @include('admin.bread_crumb._BreadCrumb')
      @include('admin.pages.application.list._ApplicationTable', ['response' => $response])
    </div>
    @include('admin.footer.footer')
@endsection
