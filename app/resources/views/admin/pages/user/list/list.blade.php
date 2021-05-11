@php
    /**
     * @var \App\Services\AdminUser\SearchUser\SearchUserFetchLevelSkillResponse $LevelSkills
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
        </ul>

        <template id="skill_row">
            <div class="p-formGroupUnit--2col__itemForSkill js-content js-remove">
                <label class="p-formGroupUnit--2col__label" for="">
                    <select name="skill_ids[]" id="" class="c-input">
                        <option value="">選択してください</option>
                        @foreach($LevelSkills->getSkills() as $skill)
                            <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                        @endforeach
                    </select>
                </label>

                <label class="p-formGroupUnit--2col__label--after" for="">
                    <select name="level_ids[]" id="" class="c-input">
                        <option value="">選択してください</option>
                        @foreach($LevelSkills->getLevels() as $level)
                            <option value="{{ $level->id }}">{{ $level->level }}</option>
                        @endforeach
                    </select>
                </label>
            </div>
        </template>
        {{--   テンプレート    --}}

        <form class="js-form" action="{{ route('user.search') }}" method="get">
            {{--checkbox--}}
            <div class="p-checkboxUnit js-tab_content">
                <label class="p-checkbox p-checkboxUnit__item">新規
                    <input value=1 name="new_user" type="checkbox" @if(request()->input('new_user')){{ 'checked' }}@endif>
                    <div class="p-checkbox__indicator"></div>
                </label>
                <label class="p-checkbox p-checkboxUnit__item">既存
                    <input value=1 name="not_new_user" type="checkbox" @if(request()->input('not_new_user')){{ 'checked' }}@endif>
                    <div class="p-checkbox__indicator"></div>
                </label>
                <label class="p-checkbox p-checkboxUnit__item">稼働中
                    <input value=1 name="is_working" type="checkbox" @if(request()->input('is_working')){{ 'checked' }}@endif>
                    <div class="p-checkbox__indicator"></div>
                </label>
                <label class="p-checkbox p-checkboxUnit__item">待機中
                    <input value=1 name="is_not_working" type="checkbox" @if(request()->input('is_not_working')){{ 'checked' }}@endif>
                    <div class="p-checkbox__indicator"></div>
                </label>
            </div>
            {{--checkbox--}}

            {{--Level Skill--}}
            <div class="p-formGroupUnit--2col u-ff-column js-parent">
                <div class="p-formGroupUnit--2col__title">
                    <p class="c-text">スキル</p>
                    <p class="c-text u-pl-15">経験</p>
                </div>
                    <div class="p-formGroupUnit--2col__itemForSkill js-content js-remove">
                        <label class="p-formGroupUnit--2col__label" for="">
                            <select name="skill_ids[]" id="skill_id" class="c-input">
                                <option value="">選択してください</option>
                                @foreach($LevelSkills->getSkills() as $skill)
                                    <option
                                        value="{{ $skill->id }}" @if(old('skill_ids[]') == $skill->id) selected @endif>{{ $skill->name }}</option>
                                @endforeach
                            </select>
                        </label>

                        <label class="p-formGroupUnit--2col__label--after" for="">
                            <select name="level_ids[]" id="" class="c-input">
                                <option value="">選択してください</option>
                                @foreach($LevelSkills->getLevels() as $level)
                                    <option
                                        value="{{ $level->id }}" @if(old('skill_ids[]') == $skill->id) selected @endif>{{ $level->level }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    {{--    itemForSkill      --}}
                <img class="c-icon--clickable u-m0a js-add" src="/images/icons/icon_add.png" alt="">
            </div>
            {{--Level Skill--}}

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
{{--            <div class="p-searchBox u-mt-20">--}}
{{--                <input name="keyword" class="c-input p-searchBox__input js-search_input" type="text" value="{{ old('keyword') }}"--}}
{{--                       placeholder="フリーワード">--}}
{{--            </div>--}}
            {{--keyword--}}
            <button type="submit"
                    class="c-button--secondary p-searchBox__button js-project_search u-db u-m0a u-w-15-pc u-mt-30 js-project_search">
                検索
            </button>
        </form>
        <div class="p-searchBox">
            <form action="{{ route('user.template') }}" method="get">
                <button type="submit" name="status" class="c-button u-m0a u-mt-30 u-w-30" value="1">未営業</button>
                <button type="submit" name="status" class="c-button u-m0a u-mt-30 u-w-30" value="2">新規稼働</button>
                <button type="submit" name="status" class="c-button u-m0a u-mt-30 u-w-30" value="3">既存稼働</button>
                <button type="submit" name="status" class="c-button u-m0a u-mt-30 u-w-30" value="4">今月面談</button>
            </form>
        </div>
        {{--  検索ボタン（dashboard連動）  --}}
        @include('admin.pages.user.list._RegularUserTable', ['response' => $response])
        {{ $response->getUsers()->links('components.paginator') }}
        @if($response->getUsers()->count() === 0)
            <p class="u-text--center mt-30 u-fs-20">関連するユーザーが見つかりませんでした。</p>
        @endif
    </div>

    @include('admin.footer.footer')
@endsection
