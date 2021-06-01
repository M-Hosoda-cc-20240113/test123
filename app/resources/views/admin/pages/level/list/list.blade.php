@php
    /**
     * @var \App\Services\Level\LevelList\LevelListResponse $response
     */
@endphp

@extends('admin.layout')

@section('title', 'レベル一覧|Aegis')

@section('body')
    @component('admin.header.header', ['href' => route('admin.index')])
        @include('admin.header._link_front_top')
        @include('admin.header._link_mypage')
        @include('admin.header._link_login_logout')
    @endcomponent

    @include('admin.pages._drawer_contents')

    <div class="l-container">
        @include('admin.bread_crumb._BreadCrumb')
        <a href="{{ route('level.createForm') }}" class="c-button p-flex__item u-w-20 u-mt-15">新規登録</a>
        @include('admin.pages.level.list._RegularTable', ['response' => $response])
        {{ $response->getLevels()->links('components.paginator') }}
    </div>
    @include('admin.footer.footer')
@endsection
