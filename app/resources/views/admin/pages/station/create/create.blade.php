@extends('front.layout')

@section('title', '駅名新規登録|Aegis')

@section('body')
    @component('admin.header.header', ['href' => route('front.index')])
        @include('admin.header._link_login_logout')
    @endcomponent
    <div class="Container mt-30">
        @include('admin.bread_crumb._BreadCrumb')
        <div class="l-container">
            <h2 class="c-text fs-20">新規駅名登録</h2>
            <hr class="Horizontal">

            @if($errors->all())
                <p class="c-text--bold u-mt-20">以下のエラーを修正してください</p>
                @foreach($errors->all() as $error)
                    <p class="c-text--warning">{{ $error }}</p>
                @endforeach
            @endif

            <div class="p-userRegister">
                <form action="{{ route('station.create') }}" method="post">
                    {{ @csrf_field() }}
                    {{--   p-userRegisterRow   --}}

                    <div class="p-userRegister__row">
                        <span class="c-text--bold p-userRegister__title u-mb-5-sp">駅名</span>
                        <div class="p-userRegister__inputUnitWrap">
                            <div class="p-userRegister__inputUnit--single u-w-50-pc">
                                <input class="c-input p-userRegister__input u-w-100-sp" type="text"
                                       placeholder="東京"
                                       name="name"
                                       value="{{ old('name') }}">
                                <span class="c-text p-userRegister__inputName">駅</span>
                            </div>
                        </div>
                    </div>

                    {{--   p-userRegisterRow   --}}

                    <div class="p-userRegister__row">
                        <span class="c-text--bold p-userRegister__title u-mb-5-sp">エリア名</span>
                        <div class="p-userRegister__inputUnitWrap">
                            <div class="p-userRegister__inputUnit--single u-w-50-pc">
                                <select class="c-input p-userRegister__input u-w-100-sp mr-20" name="area_id" id="">
                                    <option value=1>新宿区</option>
                                    <option value=2>豊島区</option>
                                    <option value=3>渋谷区</option>
                                    <option value=4>杉並区</option>
                                    <option value=5>目黒区</option>
                                </select>
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
