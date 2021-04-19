@php
/**
 * @var \App\Services\Admin\Position\PositionList\PositionListResponse $response
 */
@endphp

@extends('admin.layout')

@section('title', 'ポジション一覧|Aegis')

@section('body')
    @component('admin.header.header', ['href' => route('front.index')])
        @include('admin.header._link_login_logout')
    @endcomponent
    <div class="Container mt-30">
      @include('admin.pages.position.list._PositionTable', ['response' => $response])
    </div>

    @include('admin.footer.footer')
@endsection
