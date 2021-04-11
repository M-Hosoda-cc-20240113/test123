@extends('admin.layout')

@section('title', '案件一覧|Aegis')

@section('body')
    @include('admin.header.header')
    <div class="Container mt-30 pb-100">
        <div class="admin-project-detail">
            <p class="fw-bold fs-2">大手求人広告のUXプランナー/UXディレクター</p>
            <hr class="Horizontal">
            @include('admin.pages.project.detail._ProjectDetailTable')
        </div>
        @include('atoms.RegularBtn', ['text' => '編集', 'class' => 'w-30 m0a'])
    </div>
    @include('admin.footer.footer')
@endsection
