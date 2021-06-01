@php
    /**
     * @var \App\Services\User\ShowEditUserForm\ShowEditUserFormResponse $response
     */
@endphp
@extends('front.layout')

@section('title', 'ユーザー情報編集|Aegis')

@section('body')
    @component('front.header.header', ['href' => route('front.index')])
        @include('front.header._link_admin_top')
        @include('front.header._link_mypage')
        @include('front.header._link_login_logout')
    @endcomponent

    @include('front.pages._drawer_contents')
    @include('front.pages._loader')

    <div class="l-container--2col">
        @include('front.pages.mypage._sidebar')
        {{--  l-sidebar  --}}

        <div class="l-main">
            <div class="p-mainItem">
                <p class="p-level2Heading">ユーザー情報編集</p>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <p class="c-text--warning">{{ $error }}</p>
                    @endforeach
                @endif
                <form action="{{ route('front.user.edit') }}" method="post">
                    {{ @csrf_field() }}
                    <div class="p-formGroupUnit--2col">
                        <div class="p-formGroup p-formGroupUnit--2col__item--left">
                            <span class="c-text">姓</span>
                            <input name="sei" type="text" class="c-input2" value="{{ $response->getUser()->sei }}">
                        </div>
                        <div class="p-formGroup p-formGroupUnit--2col__item">
                            <span class="c-text">名</span>
                            <input name="mei" type="text" class="c-input2" value="{{ $response->getUser()->mei }}">
                        </div>
                        <div class="p-formGroup p-formGroupUnit--2col__item--left">
                            <span class="c-text">セイ</span>
                            <input name="sei_kana" type="text" class="c-input2"
                                   value="{{ $response->getUser()->sei_kana }}">
                        </div>
                        <div class="p-formGroup p-formGroupUnit--2col__item">
                            <span class="c-text">メイ</span>
                            <input name="mei_kana" type="text" class="c-input2"
                                   value="{{ $response->getUser()->mei_kana }}">
                        </div>
                        <div class="p-formGroup p-formGroupUnit--2col__item--left">
                            <span class="c-text">電話番号</span>
                            <input name="tel" type="number" class="c-input2" value="{{ $response->getUser()->tel }}">
                        </div>
                        <div class="p-formGroup p-formGroupUnit--2col__item">
                            <span class="c-text">生年月日</span>
                            <input name="birthday" type="number" class="c-input2"
                                   value="{{ $response->getUser()->birthday }}">
                        </div>
                    </div>

                    <button type="submit" class="c-button u-db u-m0a u-mt-20 js-loading-button">更新する</button>
                </form>
            </div>
            {{--   p-mainItem     --}}
        </div>
        {{--  l-main  --}}
    </div>

    @if(!Auth::getUser()->is_admin)
        @include('front.footer.footer')
    @else
        @include('admin.footer.footer')
    @endif
@endsection
