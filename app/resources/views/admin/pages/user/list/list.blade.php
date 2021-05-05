@php
    /**
     * @var \App\Services\AdminUser\UserList\UserListResponse $response
     */
@endphp

@extends('admin.layout')

@section('title', 'ユーザー一覧|Aegis')

@section('body')
    @component('admin.header.header', ['href' => route('front.index')])
        @include('admin.header._link_login_logout')
    @endcomponent
    <div class="Container mt-30">
        @include('admin.bread_crumb._BreadCrumb')
        @include('admin.pages.user.list._RegularUserTable', ['response' => $response])
        {{ $response->getUsers()->links('components.paginator') }}
    </div>

    @include('admin.footer.footer')
@endsection
