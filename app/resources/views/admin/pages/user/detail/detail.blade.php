@php
/**
 * @var \App\Services\User\UserDetail\UserDetailResponse $response
 */
@endphp
@extends('admin.layout')

@section('title', 'ユーザー詳細|Aegis')

@section('body')
    @component('admin.header.header', ['href' => route('front.index')])
        @include('admin.header._link_login_logout')
    @endcomponent
    <div class="Container mt-30 pb-100">
        @include('admin.bread_crumb._BreadCrumb')
        <div class="admin-project-detail">
            <p class="fw-bold fs-20">{{ $response->getUser()->sei  }}&nbsp;{{ $response->getUser()->mei }}</p>
            <hr class="Horizontal">
            @include('admin.pages.user.detail._UserDetailTable', ['response' => $response])
        </div>
        @include('atoms.RegularBtn', ['text' => '編集', 'class' => 'w-30 m0a'])
    </div>
    @include('admin.footer.footer')
@endsection
