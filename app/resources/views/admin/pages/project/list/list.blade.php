@php
/**
 * @var \App\Services\Station\StationList\StationListResponse $response
 */
@endphp

@extends('admin.layout')

@section('title', '駅名一覧|Aegis')

@section('body')
    @component('admin.header.header', ['href' => route('front.index')])
        @include('admin.header._link_login_logout')
    @endcomponent
    <div class="Container mt-30">
      @include('admin.bread_crumb._BreadCrumb')
      @include('admin.pages.project.list._RegularTable', ['response' => $response])
    </div>

    @include('admin.footer.footer')
@endsection
