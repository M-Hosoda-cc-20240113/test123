@extends('front.layout')

@section('title', '新規案件元会社登録|Aegis')

@section('body')
    @component('admin.header.header', ['href' => route('front.index')])
        @include('admin.header._link_login_logout')
    @endcomponent
<div class="Container mt-30">
    @include('admin.bread_crumb._BreadCrumb')
    <div class="l-container">
        <h2 class="c-text fs-20">新規案件元会社登録</h2>
        <hr class="Horizontal">

        @if($errors->all())
            <p class="c-text--bold u-mt-20">以下のエラーを修正してください</p>
            @foreach($errors->all() as $error)
                <p class="c-text--warning">{{ $error }}</p>
            @endforeach
        @endif

        <div class="p-userRegister">
            <form action="{{ route('agent.create') }}" method="post">
                {{ @csrf_field() }}
                {{--   p-userRegisterRow   --}}

                <div class="p-userRegister__row">
                    <span class="c-text--bold p-userRegister__title u-mb-5-sp">会社名</span>
                    <div class="p-userRegister__inputUnitWrap">
                        <div class="p-userRegister__inputUnit--single u-w-50-pc">
                            <input class="c-input p-userRegister__input u-w-100-sp" type="text"
                                   placeholder="株式会社Carecon"
                                   name="name"
                                   value="{{ old('name') }}">
                        </div>
                    </div>
                </div>
                {{--   p-userRegisterRow   --}}
                @include('atoms.Button', ['text' => '新規登録', 'class' => 'u-w-200px u-db u-m0a'])
            </form>
        </div>
    </div>
</div>
    @include('admin.footer.footer')
@endsection
