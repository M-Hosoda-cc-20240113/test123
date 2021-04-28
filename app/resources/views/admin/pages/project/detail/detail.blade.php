@extends('admin.layout')

@section('title', '案件詳細|Aegis')

@section('body')
    @component('admin.header.header', ['href' => route('front.index')])
        @include('admin.header._link_login_logout')
    @endcomponent
    <div class="Container mt-30 pb-100">
        @include('admin.bread_crumb._BreadCrumb')
        <div class="admin-project-detail">
            <p class="fw-bold fs-20">{{ $response->getProject()->name ?? '' }}
            {{ $response->getProject()->decided ? '※応募終了' : '' }}
            </p>
            <hr class="Horizontal">
            @include('admin.pages.project.detail._ProjectDetailTable', ['response' => $response])
        </div>
        @include('atoms.RegularBtn', ['text' => '編集', 'class' => 'w-30 ', 'link' => route('project.edit', ['project_id' => $response->getProject()->id])])
        @if( $response->getProject()->decided === 1)
            @include('atoms.RegularBtn', ['text' => '応募開始', 'class' => 'w-30 ', 'link' => route('project.toggle', ['project_id' => $response->getProject()->id ?? ''])])
        @elseif($response->getProject()->decided === 0)
            @include('atoms.RegularBtn', ['text' => '応募終了', 'class' => 'w-30 ', 'link' => route('project.toggle', ['project_id' => $response->getProject()->id ?? ''])])
        @endif
    </div>
    @include('admin.footer.footer')
@endsection
