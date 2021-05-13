@php
    /**
     * @var \App\Services\AdminProject\ProjectList\ProjectListResponse $response
     */
@endphp

@extends('admin.layout')

@section('title', '案件一覧|Aegis')

@section('body')
    @component('admin.header.header', ['href' => route('front.index')])
        @include('admin.header._link_login_logout')
    @endcomponent

    <nav class="p-drawerContents">
        <ul>
            <li class="u-mt-10">@include('front.header._link_login_logout')</li>
            <li class="u-mt-10"><a href="{{ route('user.list') }}">ユーザー一覧</a></li>
            <li class="u-mt-10"><a href="{{ route('project.list') }}">案件一覧</a></li>
            <li class="u-mt-10"><a href="{{ route('application.list') }}">応募状況一覧</a></li>
            <li class="u-mt-10"><a href="{{ route('assignment.list') }}">稼働状況一覧</a></li>
        </ul>
    </nav>

    <div class="l-container">
        @include('admin.bread_crumb._BreadCrumb')
        @include('admin.pages.project.list._RegularTable', ['response' => $response])
        {{ $response->getProjects()->links('components.paginator') }}
    </div>

    @include('admin.footer.footer')
@endsection
