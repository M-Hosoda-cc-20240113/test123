@php
/**
 * @var \App\Services\Admin\User\UserList\UserListResponse $response
 */
@endphp

@extends('admin.layout')

@section('title', 'ユーザー一覧|Aegis')

@section('body')
    @include('admin.header.header')
    <div class="Container mt-30">
      @include('admin.pages.user.list._RegularUserTable', ['response' => $response])
    </div>

    @include('admin.footer.footer')
@endsection
