@php
    /**
     * @var \App\Services\Agent\AgentList\AgentListResponse $response
     */
@endphp

@extends('admin.layout')

@section('title', '案件元会社一覧|Aegis')

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
        @include('admin.pages.agent.list._RegularTable', ['response' => $response])
        {{ $response->getAgents()->links('components.paginator') }}
        <a href="{{ route('agent.create.form') }}" class="c-button u-db u-m0a u-mt-30 u-w-15-pc">新規登録する</a>
    </div>
    @include('admin.footer.footer')
@endsection
