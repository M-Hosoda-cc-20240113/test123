@php
/**
 * @var \App\Services\AdminProject\ProjectDetail\ProjectDetailResponse $response
 */
@endphp
@extends('admin.layout')

@section('title', '案件詳細|Aegis')

@section('body')
    @component('admin.header.header', ['href' => route('front.index')])
        @include('admin.header._link_login_logout')
    @endcomponent

    <nav class="p-drawerContents">
        <ul>
            <li class="u-mt-10">@include('front.header._link_login_logout')</li>
            <li class="u-mt-10"><a href="{{ route('user.list') }}">ユーザー一覧</a></li>
            <li class="u-mt-10"><a href="{{ route('project.list') }}">案件一覧</a></li>
            <li class="u-mt-10"><a href="{{ route('application.list') }}">応募状況一覧</a></li>
            <li class="u-mt-10"><a href="{{ route('assignment.list') }}">稼働状況一覧</a></li>
        </ul>
    </nav>

    <div class="l-container">
        <div class="l-main">
            @include('admin.bread_crumb._BreadCrumb')
            <div class="p-mainItem u-mt-20">
                <h2 class="p-level2Heading">{{ $response->getProject()->name ?? '' }}{{ $response->getProject()->decided ? '※応募終了' : '' }}</h2>
                @include('admin.pages.project.detail._ProjectDetailTable', ['response' => $response])

                <a class="c-button u-db u-m0a u-w-30-pc u-mt-30" href="{{ route('project.edit.form', ['project_id' => $response->getProject()->id]) }}">編集</a>
                {{--   編集  --}}

                <form action="{{ route('project.toggle') }}" method="POST">
                    {{ @csrf_field() }}
                    <input type="hidden" name="project_id" value="{{ $response->getProject()->id }}">
                    <button type="submit" class="c-button u-db u-m0a u-w-30-pc u-mt-10">{{ $response->getProject()->decided ? '応募開始' : '応募終了' }}</button>
                </form>
                {{--   応募終了  --}}

                <form action="{{ route('project.delete') }}" method="POST">
                    {{ @csrf_field() }}
                    <input type="hidden" name="project_id" value="{{ $response->getProject()->id }}">
                    <button type="submit" class="c-button--warning u-db u-m0a u-w-30-pc u-mt-10" id="alert_button">削除</button>
                </form>
                {{--   削除  --}}
            </div>
        </div>
    </div>
    @include('admin.footer.footer')
@endsection
