@php
/**
 * @var \App\Services\AdminUser\UserDetail\UserDetailResponse $response
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
            <p class="fw-bold fs-20">{{ $response->getUser()->sei  }}&nbsp;{{ $response->getUser()->mei }} {{ $response->getUser()->is_new ? '※新規ユーザー' : '' }}</p>
            <hr class="Horizontal">
            @include('admin.pages.user.detail._UserDetailTable', ['response' => $response])
        </div>
        @include('atoms.RegularBtn', ['text' => '編集', 'class' => 'w-30 m0a', 'link' => route('user.edit.form', ['user_id' => $response->getUser()->id])] )
    </div>
    @include('admin.footer.footer')
@endsection
