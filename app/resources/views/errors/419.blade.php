@extends('errors.layout')

@section('title', '419|Aegis')

@section('body')
    @component('front.header.header', ['href' => route('front.index')])
        @include('front.header._link_mypage')
        @include('front.header._link_login_logout')
    @endcomponent
    <div class="l-container">
        <p>ページの有効期限が切れました。</p>
    </div>
    @include('errors.footer.footer')
@endsection
