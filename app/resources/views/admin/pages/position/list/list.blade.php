@php
    /**
     * @var \App\Services\Position\PositionList\PositionListResponse $response
     */
@endphp

@extends('admin.layout')

@section('title', 'ポジション一覧|Aegis')

@section('body')
    @component('admin.header.header', ['href' => route('front.index')])
        @include('admin.header._link_mypage')
        @include('admin.header._link_login_logout')
    @endcomponent

    @include('admin.pages._drawer_contents')

    <div class="l-container">
        @include('admin.bread_crumb._BreadCrumb')
        <a href="{{ route('position.createForm') }}" class="c-button p-flex__item u-w-20 u-mt-15">新規登録</a>
        @include('admin.pages.position.list._PositionTable', ['response' => $response])
        {{ $response->getPositions()->links('components.paginator') }}
    </div>
    @include('admin.footer.footer')
@endsection
