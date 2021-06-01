@php
    /**
     * @var \App\Services\Skill\SkillList\SkillListResponse $response
     */
@endphp

@extends('admin.layout')

@section('title', 'スキル一覧|Aegis')

@section('body')
    @component('admin.header.header', ['href' => route('admin.index')])
        @include('admin.header._link_front_top')
        @include('admin.header._link_mypage')
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
        <a href="{{ route('skill.createForm') }}" class="c-button p-flex__item u-w-20 u-mt-15">新規登録</a>
        @include('admin.pages.skill.list._SkillTable', ['response' => $response])
        {{ $response->getSkills()->links('components.paginator') }}
    </div>

    @include('admin.footer.footer')
@endsection
