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
    <div class="Container mt-30">
        @include('admin.bread_crumb._BreadCrumb')
        @include('admin.pages.agent.list._RegularTable', ['response' => $response])
        <a href="{{ route('agent.create.form') }}" class="c-button u-db u-m0a u-mt-30 u-w-30-pc">新規登録する</a>
    </div>
    @include('admin.footer.footer')
@endsection
