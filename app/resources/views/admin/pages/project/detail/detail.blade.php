@extends('admin.layout')

@section('title', '案件詳細|Aegis')

@section('body')
    @include('admin.header.header')
    <div class="Container mt-30 pb-100">
        <div class="admin-project-detail">
            <p class="fw-bold fs-2">{{ $response->getProject()->name ?? '' }}</p>
            <hr class="Horizontal">
            @include('admin.pages.project.detail._ProjectDetailTable', $response->getProject())
        </div>
        @include('atoms.RegularBtn', ['text' => '編集', 'class' => 'w-30 m0a'])
    </div>
    @include('admin.footer.footer')
@endsection
