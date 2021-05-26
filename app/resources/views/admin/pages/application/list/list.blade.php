@php
    /**
     * @var \App\Services\Application\ApplicationList\ApplicationListResponse $response
     */
@endphp

@extends('admin.layout')

@section('title', '応募状況一覧|Aegis')

@section('body')
    @component('admin.header.header', ['href' => route('front.index')])
        @include('admin.header._link_mypage')
        @include('admin.header._link_login_logout')
    @endcomponent

    @include('admin.pages._drawer_contents')

    <div class="l-container">
        @include('admin.bread_crumb._BreadCrumb')
        @include('admin.pages.application.list._ApplicationTable', ['response' => $response])
        {{ $response->getApplications()->links('components.paginator') }}
    </div>
    @include('admin.footer.footer')
@endsection
