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

    <nav class="p-drawerContents">
        <ul>
            <li>@include('front.header._link_mypage')</li>
            <li>@include('front.header._link_login_logout')</li>
            <li><a href="{{ route('front.user.edit') }}">ユーザー情報編集</a> </li>
            <li><a href="{{ route('password.request') }}">パスワード変更</a> </li>
            <li><a href="{{ route('email.request') }}">メールアドレス変更</a> </li>
            <li><a href="{{ route('front.user.skill.form') }}">スキル編集</a></li>
            <li><a href="{{ route('front.user.delete.form') }}">退会</a></li>
        </ul>
    </nav>

    <div class="l-container--2col">
        <div class="l-sidebar u-dn-sp">
            <ul class="p-list {{ $class ?? '' }}">
                <li class="c-text p-list__item--header">メニュー</li>
                <li class="p-list__item"><a class="c-text p-list__itemInner" href="{{ route('front.user.edit') }}">ユーザー情報編集</a>
                </li>
                <li class="p-list__item"><a class="c-text p-list__itemInner" href="{{ route('password.request') }}">パスワード変更</a>
                </li>
                <li class="p-list__item"><a class="c-text p-list__itemInner" href="{{ route('email.request') }}">メールアドレス変更</a>
                </li>
                <li class="p-list__item"><a class="c-text p-list__itemInner"
                                            href="{{ route('front.user.skill.form') }}">スキル編集</a></li>
                <li class="p-list__item"><a class="c-text p-list__itemInner"
                                            href="{{ route('front.user.delete.form') }}">退会</a></li>
            </ul>
        </div>
        <div class="l-main">
            <div class="p-mainItem">
                <p class="p-level2Heading">ユーザー退会</p>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <p class="c-text--warning">{{ $error }}</p>
                    @endforeach
                @endif
                <p class="c-text">下記の内容をご確認の上、「退会する」ボタンを押してください。</p>
                <form action="{{ route('front.user.delete') }}" method="POST">
                    {{ @csrf_field() }}
                    <p class="c-text--warning c-text--bold c-text--center u-mt-30">退会後は登録内容の確認ができなくなり、<br class="u-dn-pc">取得したポイントは破棄されます。</p>
                    <div class="u-db u-m0a u-w-180px u-mt-30">
                        <label class="p-checkbox p-checkboxUnit__item u-db u-m0a">確認しました。
                            <input class="js-confirm-checkbox" type="checkbox" name="withdraw-confirm" value="confirm"/>
                            <div class="p-checkbox__indicator"></div>
                        </label>
                    </div>
                    <button type="submit" disabled="true" class="c-button--warning c-button--disabled u-db u-m0a u-mt-20 js-confirm-button">退会する</button>
                </form>
            </div>
        </div>
    </div>
    @include('front.footer.footer')
@endsection
