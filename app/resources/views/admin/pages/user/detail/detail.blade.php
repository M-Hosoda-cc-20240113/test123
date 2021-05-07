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
    <div class="l-container">
        <div class="l-main">
            @include('admin.bread_crumb._BreadCrumb')
            <div class="p-mainItem">
                <h2 class="p-level2Heading">{{ $response->getUser()->sei  }}&nbsp;{{ $response->getUser()->mei }}{{ $response->getUser()->is_new ? '※新規ユーザー' : '' }}</h2>
                @include('admin.pages.user.detail._UserDetailTable', ['response' => $response])
                <a class="c-button u-db u-w-30-pc u-m0a u-mt-20" href="{{ route('user.edit.form', ['user_id' => $response->getUser()->id]) }}">編集</a>
            </div>
        </div>
    </div>
    @include('admin.footer.footer')
@endsection
