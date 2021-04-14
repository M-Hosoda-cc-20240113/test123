@extends('front.layout')

@section('title', 'トップページ|Aegis')

@section('body')
    @component('front.header.header', ['href' => route('front.index')])
        @include('front.header._link_login_logout')
    @endcomponent
    <div class="Container d-flex mt-30">
        <div class="SideBar">
            @include('front.pages.mypage.top._RegularList')
        </div>
        <div class="Main">
            @include('front.pages.mypage.top._SideColumnTable')
        </div>
    </div>

    @include('front.footer.footer')
@endsection
