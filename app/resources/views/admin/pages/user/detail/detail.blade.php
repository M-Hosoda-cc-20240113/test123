@php
/**
 * @var \App\Services\User\UserDetail\UserDetailResponse $response
 */
@endphp
@extends('admin.layout')

@section('title', 'ユーザー詳細|Aegis')

@section('body')
    @include('admin.header.header')
    <div class="Container mt-30 pb-100">
        <div class="admin-project-detail">
            <p class="fw-bold fs-2">{{ $response->getUser()->sei  }}&nbsp;{{ $response->getUser()->mei }}</p>
            <hr class="Horizontal">
            @include('admin.pages.user.detail._UserDetailTable', $response->getUser())
        </div>
        @include('atoms.RegularBtn', ['text' => '編集', 'class' => 'w-30 m0a'])
    </div>
    @include('admin.footer.footer')
@endsection
