@php
/**
 * @var \App\Services\Admin\_Assignment\_AssignmentList\_AssignmentListResponse $response
 */
@endphp

@extends('admin.layout')

@section('title', '稼働状況一覧|Aegis')

@section('body')
    @include('admin.header.header')
    <div class="Container mt-30">
      @include('admin.bread_crumb._BreadCrumb')
      @include('admin.pages.assignment.list._AssignmentTable', ['response' => $response])
    </div>
    @include('admin.footer.footer')
@endsection
