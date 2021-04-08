@php
/**
 * @var \App\Services\Admin\Position\PositionList\PositionListResponse $response
 */
@endphp

@extends('admin.layout')

@section('title', 'ポジション一覧|Aegis')

@section('body')
    @include('admin.header.header')
    <div class="Container mt-30">
      @include('admin.pages.position.list._PositionTable', ['response' => $response])
    </div>

    @include('admin.footer.footer')
@endsection
