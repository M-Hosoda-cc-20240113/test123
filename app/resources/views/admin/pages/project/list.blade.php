@php
/**
 * @var \App\Services\Admin\Project\ProjectList\ProjectListResponse $response
 */
@endphp

@extends('admin.layout')

@section('title', '案件一覧|Aegis')

@section('body')
    @include('admin.header.header')
    <div class="Container mt-30">
      @include('organisms.ProjectTable', ['response' => $response])
    </div>

    @include('admin.footer.footer')
@endsection