@php
    /**
     * @var \App\Services\Assignment\AssignmentList\AssignmentListResponse $response
     */
@endphp

@extends('admin.layout')

@section('title', '稼働状況一覧|Aegis')

@section('body')
    @include('admin.header.header')
    <div class="Container mt-30">
        @include('admin.bread_crumb._BreadCrumb')
        @include('admin.pages.assignment.list._AssignmentTable', ['response' => $response])
        {{ $response->getAssignments()->links('components.paginator') }}
    </div>
    @include('admin.footer.footer')
@endsection
