@extends('admin.layout')

@section('title', '案件詳細|Aegis')

@section('body')
    @component('admin.header.header', ['href' => route('front.index')])
        @include('admin.header._link_login_logout')
    @endcomponent
    <div class="Container mt-30 pb-100" data-route-name="project.detail">
        @include('admin.bread_crumb._BreadCrumb')
        <div class="admin-project-detail">
            <p class="fw-bold fs-20">{{ $response->getProject()->name ?? '' }}
                {{ $response->getProject()->decided ? '※応募終了' : '' }}
            </p>
            <hr class="Horizontal">
            @include('admin.pages.project.detail._ProjectDetailTable', ['response' => $response])
        </div>
        @if($errors->all())
            @foreach($errors->all() as $error)
                <p class="c-text--warning" style="color: red">{{ $error }}</p>
            @endforeach
        @endif
        @include('atoms.RegularBtn', ['text' => '編集', 'class' => 'w-30 ', 'link' => route('project.edit.form', ['project_id' => $response->getProject()->id])])
        <form action="{{ route('project.toggle') }}" method="POST">
            {{ @csrf_field() }}
            <input type="hidden" name="project_id" value="{{ $response->getProject()->id }}">
            <button type="submit"
                    class="RegularBtn w-30 ">{{ $response->getProject()->decided ? '応募開始' : '応募終了' }}</button>
        </form>
        <form action="{{ route('project.delete') }}" method="POST">
            {{ @csrf_field() }}
            <input type="hidden" name="project_id" value="{{ $response->getProject()->id }}">
            <button style="background-color: coral" type="submit" class="RegularBtn w-30 "
                    id="alert_button">削除
            </button>
        </form>
    </div>
@endsection
