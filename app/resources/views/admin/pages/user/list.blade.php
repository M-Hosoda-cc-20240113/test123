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
      @include('organisms.RegularTable', ['response' => $response])
    </div>

    @include('admin.footer.footer')
@endsection