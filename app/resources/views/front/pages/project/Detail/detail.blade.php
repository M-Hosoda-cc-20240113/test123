@extends('front.layout')

@section('title', '案件詳細|Aegis')
@section('body')
    @include('front.header.header')
    <div class="Container mt-30 pb-100">
        <div class="admin-project-detail">
            <p class="fw-bold fs-2">{{ $response->getProject()->name ?? '' }}</p>
            <hr class="Horizontal">
            @include('front.pages.project.detail._ProjectDetailTable', ['response' => $response])
        </div>
        @include('atoms.RegularBtn', ['link' => '/' ,'text' => '応募する', 'class' => 'w-30 m0a'])
    </div>
@include('front.footer.footer')
@endsection
