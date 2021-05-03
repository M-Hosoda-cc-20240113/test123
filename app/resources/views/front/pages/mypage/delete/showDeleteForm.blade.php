@php
    /**
     * @var \App\Services\User\UserPage\UserPageResponse $response
     */
@endphp
@extends('front.layout')
@section('body')
    @component('front.header.header', ['href' => route('front.index')])
        @include('front.header._link_mypage')
        @include('front.header._link_login_logout')
    @endcomponent
    <div class="l-container">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <p class="c-text--warning">{{ $error }}</p>
            @endforeach
        @endif
        <p class="p-level2Heading">ユーザー退会</p>
        <p class="c-text">下記の内容をご確認の上、「退会する」ボタンを押してください。</p>
        <form action="{{ route('front.user.delete') }}" method="POST">
            {{ @csrf_field() }}
            <p class="c-text--warning c-text--bold c-text--center u-mt-30">退会後は登録内容の確認ができなくなり、<br class="u-dn-pc">取得したポイントは破棄されます。</p>
            <div class="u-db u-m0a u-w-180px u-mt-30">
                <label class="p-checkbox p-checkboxUnit__item u-db u-m0a">確認しました。
                    <input type="checkbox" name="withdraw-confirm" value="confirm"/>
                    <div class="p-checkbox__indicator"></div>
                </label>
            </div>
            <button type="submit" class="c-button u-db u-m0a u-mt-20">退会する</button>
        </form>
    </div>
    @include('front.footer.footer')
@endsection
