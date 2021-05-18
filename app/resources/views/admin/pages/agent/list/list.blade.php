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
    <div class="l-container">
        @include('admin.bread_crumb._BreadCrumb')
        <a href="{{ route('agent.create.form') }}" class="c-button u-db u-mt-20 u-w-20-pc">新規登録する</a>
        @include('admin.pages.agent.list._RegularTable', ['response' => $response])
        {{ $response->getAgents()->links('components.paginator') }}
    </div>
    @include('admin.footer.footer')
@endsection
