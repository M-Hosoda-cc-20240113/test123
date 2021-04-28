@php
    /**
     * @var \App\Services\User\UserPage\UserPageResponse $response
     */
@endphp
@extends('front.layout')
@section('body')
    @component('front.header.header', ['href' => route('front.index')])
        @include('front.header._link_login_logout')
    @endcomponent
    <div class="l-container">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <p class="c-text--warning">{{ $error }}</p>
            @endforeach
        @endif
        <p class="p-level2Heading">ユーザー退会</p>
        <div>
            下記の内容をご確認の上、「退会する」ボタンを押してください。
            <form action="{{ route('front.user.delete') }}" method="POST">
                {{ @csrf_field() }}
                <div class="p-checkboxUnit">
                    <label class="p-checkbox p-checkboxUnit__item">
                        <p style="color: red">※退会後は、登録内容の確認はできなくなり取得したポイントは破棄されます。</p>
                    </label>
                    <label class="p-checkbox p-checkboxUnit__item">確認しました。
                        <input type="checkbox" name="withdraw-confirm" value="confirm"/>
                        <div class="p-checkbox__indicator"></div>
                    </label>
                </div>
                <button type="submit" class="c-button u-db u-m0a u-mt-20">退会する</button>
            </form>
        </div>
    </div>
    @include('front.footer.footer')
@endsection
