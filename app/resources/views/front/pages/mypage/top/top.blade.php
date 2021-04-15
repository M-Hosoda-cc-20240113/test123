@php
    /**
     * @var \App\Services\User\UserPage\UserPageResponse $response
     */
@endphp
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
            <p class="fw-bold fs-2">ユーザー情報</p>
            <hr class="Horizontal">
            @include('front.pages.mypage.top._SideColumnTable', ['response' => $response])

            <p class="fw-bold fs-2 mt-20">スキル</p>
            <hr class="Horizontal">
            <div class="d-flex">
                @include('atoms.Tag', ['text' => 'PHP（3年以上）', 'class' => 'mr-10'])
                @include('atoms.Tag', ['text' => 'Python（1年未満）'])
            </div>
        </div>
    </div>

    @include('front.footer.footer')
@endsection
