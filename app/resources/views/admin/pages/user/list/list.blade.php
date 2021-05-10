@php
    /**
     * @var \App\Services\AdminUser\FetchLevelSkill\FetchLevelSkillResponse $response
     */
@endphp

@extends('admin.layout')

@section('title', 'ユーザー一覧|Aegis')

@section('body')
    @component('admin.header.header', ['href' => route('front.index')])
        @include('admin.header._link_login_logout')
    @endcomponent
    <div class="Container mt-30">
        @include('admin.bread_crumb._BreadCrumb')
        @if($errors->all())
            <p class="c-text--bold u-mt-20">検索条件が不正です。</p>
            @foreach($errors->all() as $error)
                <p class="c-text--warning">{{ $error }}</p>
            @endforeach
        @endif
        <ul class="p-searchTab">
            <li class="p-searchTab__item js-tab is-active"><span class="u-dn-sp">ユーザーカテゴリー</span></li>
            <li class="p-searchTab__item js-tab">スキル<span class="u-dn-sp">でさがす</span></li>
            <li class="p-searchTab__item js-tab">レベル<span class="u-dn-sp">でさがす</span></li>
        </ul>

        <form class="js-form" action="{{ route('user.search') }}" method="get">
            {{--checkbox--}}
            <div class="p-checkboxUnit js-tab_content">
                <label class="p-checkbox p-checkboxUnit__item">新規
                    <input value=1 name="new_user" type="checkbox" @if(!\Route::is('user.search') && old('new_user') == $LevelSkills->getSearchedNewUser()){{ 'checked' }}@endif>
                    <div class="p-checkbox__indicator"></div>
                </label>
                <label class="p-checkbox p-checkboxUnit__item">既存
                    <input value=1 name="not_new_user" type="checkbox" @if(!\Route::is('user.search') && old('not_new_user') == $LevelSkills->getSearchedNotNewUser()){{ 'checked' }}@endif>
                    <div class="p-checkbox__indicator"></div>
                </label>
                <label class="p-checkbox p-checkboxUnit__item">稼働中
                    <input value=1 name="is_working" type="checkbox" @if(!\Route::is('user.search') && old('is_working') == $LevelSkills->getSearchedIsWorking()){{ 'checked' }}@endif>
                    <div class="p-checkbox__indicator"></div>
                </label>
                <label class="p-checkbox p-checkboxUnit__item">待機中
                    <input value=1 name="is_not_working" type="checkbox" @if(!\Route::is('user.search') && old('is_not_working') == $LevelSkills->getSearchedIsNotWorking()){{ 'checked' }}@endif>
                    <div class="p-checkbox__indicator"></div>
                </label>
            </div>

            <div class="p-checkboxUnit js-tab_content">
                @foreach($LevelSkills->getSkills() as $skill)
                    <label class="p-checkbox p-checkboxUnit__item">{{ $skill->name }}
                        <input value="{{ $skill->id }}" name="skill_ids[]" type="checkbox" @if(!\Route::is('user.search') && in_array($skill->id, $LevelSkills->getSearchedSkillIds())){{ 'checked' }}@endif>
                        <div class="p-checkbox__indicator"></div>
                    </label>
                @endforeach
            </div>
            {{--  skills  --}}

            <div class="p-checkboxUnit js-tab_content">
                @foreach($LevelSkills->getLevels() as $level)
                    <label class="p-checkbox p-checkboxUnit__item">{{ $level->level }}
                        <input value="{{ $level->id }}" name="position_ids[]" type="checkbox" @if(!\Route::is('user.search') && in_array($level->id, $LevelSkills->getSearchedLevelIds())){{ 'checked' }}@endif>
                        <div class="p-checkbox__indicator"></div>
                    </label>
                @endforeach
            </div>
            {{--  positions  --}}
            {{--checkbox--}}

            {{--operation_start_month--}}
            <div class="p-register__row u-mt-20">
                <span class="p-register__title c-text--bold">営業開始月</span>
                <div class="p-register__itemWrap u-ff-row">
                    <div class="p-register__item u-w-50-pc">
                        <input type="date"
                               class="c-input"
                               name="operation_start_month"
                               value="{{ old('operation_start_month') }}">
                    </div>
                </div>
            </div>
            {{--operation_start_month--}}

            {{--keyword--}}
            <div class="p-searchBox u-mt-20">
                <input name="keyword" class="c-input p-searchBox__input js-search_input" type="text" value="{{ old('keyword') }}"
                       placeholder="フリーワード">
            </div>
            {{--keyword--}}
            <button type="submit"
                    class="c-button--secondary p-searchBox__button js-project_search u-db u-m0a u-w-15-pc u-mt-30 js-project_search">
                検索
            </button>
        </form>
        <div class="p-searchBox u-mt-20">
            <a href="{{ route('admin.index')}}" class="c-button u-m0a u-mt-30 u-w-20-pc">未営業</a>
            <a href="{{ route('admin.index')}}" class="c-button u-m0a u-mt-30 u-w-20-pc">新規稼働</a>
            <a href="{{ route('admin.index')}}" class="c-button u-m0a u-mt-30 u-w-20-pc">既存稼働</a>
            <a href="{{ route('admin.index')}}" class="c-button u-m0a u-mt-30 u-w-20-pc">今月面談</a>
        </div>
        {{--  検索ボタン（dashboard連動）  --}}
        @include('admin.pages.user.list._RegularUserTable', ['response' => $response])
        {{ $response->getUsers()->links('components.paginator') }}
    </div>

    @include('admin.footer.footer')
@endsection
