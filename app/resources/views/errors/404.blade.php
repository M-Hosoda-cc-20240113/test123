@extends('errors.layout')

@section('title', '404|Aegis')

@section('body')
    @component('front.header.header', ['href' => route('front.index')])
        @include('front.header._link_mypage')
        @include('front.header._link_login_logout')
    @endcomponent
    <div class="Container mt-30">
        <a href="hoge">@include('atoms.Tag', ['component' => 'Tag--link', 'text' => "404 | ページが見つかりません", 'class' => 'mr-5 mb-5'])</a>
    </div>
    @include('errors.footer.footer')
@endsection
