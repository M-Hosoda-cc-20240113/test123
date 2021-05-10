@extends('front.layout2')

@section('title', 'トップページ|Aegis')

@section('body')
    <div class="l-header">
        @component('front.header.header', ['href' => route('front.index')])
            @include('front.header._link_mypage')
            @include('front.header._link_login_logout')
        @endcomponent
    </div>
    <div class="l-container">
        <div class="c-drawer" id="">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <nav class="c-nav">
        <ul>
            <li><a href="#">メニュー1</a></li>
            <li><a href="#">メニュー2</a></li>
            <li><a href="#">メニュー3</a></li>
            <li><a href="#">メニュー4</a></li>
            <li><a href="#">メニュー5</a></li>
        </ul>
    </nav>
@endsection
