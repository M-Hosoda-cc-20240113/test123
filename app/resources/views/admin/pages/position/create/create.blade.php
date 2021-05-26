@extends('front.layout')

@section('title', '新規ポジション登録|Aegis')

@section('body')
    @component('admin.header.header', ['href' => route('front.index')])
        @include('admin.header._link_mypage')
        @include('admin.header._link_login_logout')
    @endcomponent
    @include('admin.pages._drawer_contents')
    <div class="l-container">
        <div class="l-container">
            @include('admin.bread_crumb._BreadCrumb')
            <div class="l-main u-mt-20">
                <div class="p-mainItem">
                    <h2 class="p-level2Heading">新規ポジション登録</h2>

                    @if($errors->all())
                        <p class="c-text--bold u-mt-20">以下のエラーを修正してください</p>
                        @foreach($errors->all() as $error)
                            <p class="c-text--warning">{{ $error }}</p>
                        @endforeach
                    @endif

                    <div class="p-register">
                        <form action="{{ route('position.create') }}" method="post">
                            {{ @csrf_field() }}
                            <div class="p-register__row u-mt-20">
                                <span class="p-register__title c-text--bold">ポジション</span>
                                <div class="p-register__itemWrap">
                                    <div class="p-register__item">
                                        <input class="c-input u-w-60-pc" type="text"
                                               placeholder="フロントエンジニア"
                                               name="name"
                                               value="{{ old('name') }}">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="c-button u-db u-m0a u-mt-30 u-w-15-pc">新規登録</button>
                        </form>
                    </div>
                    {{--   p-register   --}}
                </div>
            </div>
        </div>
    </div>
    @include('admin.footer.footer')
@endsection
