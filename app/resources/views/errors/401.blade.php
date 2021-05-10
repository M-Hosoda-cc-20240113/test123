@extends('errors.layout')

@section('title', '401|Aegis')

@section('body')
    @component('front.header.header', ['href' => route('front.index')])
        @include('front.header._link_mypage')
        @include('front.header._link_login_logout')
    @endcomponent
    <div class="l-container">
        <p>401 | Unauthorized</p>
    </div>
    @include('errors.footer.footer')
@endsection
