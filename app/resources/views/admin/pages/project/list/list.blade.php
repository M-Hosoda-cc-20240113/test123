@php
    /**
     * @var \App\Services\AdminProject\ProjectList\ProjectListResponse $response
     */
@endphp

@extends('admin.layout')

@section('title', '案件一覧|Aegis')

@section('body')
    @component('admin.header.header', ['href' => route('front.index')])
        @include('admin.header._link_mypage')
        @include('admin.header._link_login_logout')
    @endcomponent
    @include('admin.pages._drawer_contents')
    <div class="l-container">
        @include('admin.bread_crumb._BreadCrumb')
        @include('admin.pages.project.list._RegularTable', ['response' => $response])
        {{ $response->getProjects()->links('components.paginator') }}
    </div>

    @include('admin.footer.footer')
@endsection
