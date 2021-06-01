@php
    /**
     * @var \App\Services\Station\StationList\StationListResponse $response
     */
@endphp

@extends('admin.layout')

@section('title', '駅名一覧|Aegis')

@section('body')
    @component('admin.header.header', ['href' => route('admin.index')])
        @include('admin.header._link_front_top')
        @include('admin.header._link_mypage')
        @include('admin.header._link_login_logout')
    @endcomponent
    @include('admin.pages._drawer_contents')
    <div class="l-container">
        @include('admin.bread_crumb._BreadCrumb')
        <a href="{{ route('station.create.form') }}" class="c-button u-ml-10 u-w-auto u-mt-20">新規登録する</a>
        @include('admin.pages.station.list._RegularTable', ['response' => $response])
        {{ $response->getStations()->links('components.paginator') }}
    </div>

    @include('admin.footer.footer')
@endsection
