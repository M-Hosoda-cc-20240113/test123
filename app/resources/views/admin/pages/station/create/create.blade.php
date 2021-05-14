@extends('front.layout')

@section('title', '駅名新規登録|Aegis')

@section('body')
    @component('admin.header.header', ['href' => route('front.index')])
        @include('admin.header._link_login_logout')
    @endcomponent

    <nav class="p-drawerContents">
        <ul>
            <li class="u-mt-10">@include('front.header._link_login_logout')</li>
            <li class="u-mt-10"><a href="{{ route('user.list') }}">ユーザー一覧</a></li>
            <li class="u-mt-10"><a href="{{ route('project.list') }}">案件一覧</a></li>
            <li class="u-mt-10"><a href="{{ route('application.list') }}">応募状況一覧</a></li>
            <li class="u-mt-10"><a href="{{ route('assignment.list') }}">稼働状況一覧</a></li>
        </ul>
    </nav>

    <div class="l-container">
        @include('admin.bread_crumb._BreadCrumb')
        <div class="l-main u-mt-20">
            <div class="p-mainItem">
                <h2 class="p-level2Heading">新規駅名登録</h2>

                @if($errors->all())
                    <p class="c-text--bold u-mt-20">以下のエラーを修正してください</p>
                    @foreach($errors->all() as $error)
                        <p class="c-text--warning">{{ $error }}</p>
                    @endforeach
                @endif

                <div class="p-register u-mt-30">
                    <form action="{{ route('station.create') }}" method="post">
                        {{ @csrf_field() }}
                        {{--   p-userRegisterRow   --}}

                        <div class="p-register__row">
                            <span class="p-register__title c-text--bold">駅名</span>
                            <div class="p-register__itemWrap">
                                <div class="p-register__item u-w-50-pc">
                                    <input class="c-input"
                                           type="text"
                                           placeholder="東京"
                                           name="name"
                                           value="{{ old('name') }}">
                                    <span class="c-text u-as-center u-pl-10">駅</span>
                                </div>
                            </div>
                        </div>

                        {{--   p-userRegisterRow   --}}

                        <div class="p-register__row">
                            <span class="p-register__title c-text--bold">エリア名</span>
                            <div class="p-register__itemWrap">
                                <div class="p-register__item u-w-50-pc">
                                    <input class="c-input"
                                           list="area"
                                           name="area_name"
                                           type="text">
                                    <datalist id="area">
                                        @foreach($response->getAreas() as $area)
                                            <option value={{ $area->name }}>
                                        @endforeach
                                    </datalist>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="c-button u-db u-m0a u-mt-30 u-w-15-pc">新規登録</button>
                    </form>
                </div>
                {{--    p-register    --}}
            </div>
        </div>
    </div>
    @include('admin.footer.footer')
@endsection
