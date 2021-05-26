@php
    /**
     * @var \App\Services\Station\StationList\StationListResponse $response
     */
@endphp

@extends('admin.layout')

@section('title', '駅名一覧|Aegis')

@section('body')
    @component('admin.header.header', ['href' => route('front.index')])
        @include('admin.header._link_mypage')
        @include('admin.header._link_login_logout')
    @endcomponent
    <div class="l-container">
        @include('admin.bread_crumb._BreadCrumb')
        <a href="{{ route('station.create.form') }}" class="c-button u-db u-mt-20 u-w-20-pc">新規登録する</a>
        @include('admin.pages.station.list._RegularTable', ['response' => $response])
        {{ $response->getStations()->links('components.paginator') }}
    </div>

    @include('admin.footer.footer')
@endsection
