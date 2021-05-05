@extends('admin.layout')

@section('title', 'ダッシュボード|Aegis')

@section('body')
    @component('admin.header.header', ['href' => route('front.index')])
        @include('admin.header._link_login_logout')
    @endcomponent
    <div class="l-container--2col">
        <div class="l-sidebar">
            @include('admin.pages.dashboard._RegularList')
        </div>
    </div>

    @include('admin.footer.footer')
@endsection
