@php
    /**
     * @var \App\Services\AdminUser\FetchLevelSkill\FetchLevelSkillResponse $LevelSkills
     */
@endphp

@extends('admin.layout')

@section('title', 'ユーザー一覧|Aegis')

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
        @if($errors->all())
            <p class="c-text--bold u-mt-20">検索条件が不正です。</p>
            @foreach($errors->all() as $error)
                <p class="c-text--warning">{{ $error }}</p>
            @endforeach
        @endif
        <ul class="p-searchTab u-mt-20">
            <li class="p-searchTab__item u-w-60-sp js-tab is-active"><span>ユーザーカテゴリー</span></li>
        </ul>

        <template id="skill_row">
            <div class="p-formGroupUnit--2col__itemForSkill js-content js-remove">
                <label class="p-formGroupUnit--2col__label" for="">
                    <select name="skill_ids[]" id="" class="c-input">
                        <option value="">選択してください</option>
                        @foreach($response->getSkills() as $skill)
                            <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                        @endforeach
                    </select>
                </label>

                <label class="p-formGroupUnit--2col__label--after" for="">
                    <select name="level_ids[]" id="" class="c-input">
                        <option value="">選択してください</option>
                        @foreach($response->getLevels() as $level)
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
                    <input value=1 name="new_user"
                           type="checkbox" @if(request()->input('new_user')){{ 'checked' }}@endif>
                    <div class="p-checkbox__indicator"></div>
                </label>
                <label class="p-checkbox p-checkboxUnit__item">既存
                    <input value=1 name="not_new_user"
                           type="checkbox" @if(request()->input('not_new_user')){{ 'checked' }}@endif>
                    <div class="p-checkbox__indicator"></div>
                </label>
                <label class="p-checkbox p-checkboxUnit__item">稼働中
                    <input value=1 name="is_working"
                           type="checkbox" @if(request()->input('is_working')){{ 'checked' }}@endif>
                    <div class="p-checkbox__indicator"></div>
                </label>
                <label class="p-checkbox p-checkboxUnit__item">待機中
                    <input value=1 name="is_not_working"
                           type="checkbox" @if(request()->input('is_not_working')){{ 'checked' }}@endif>
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
                @foreach($response->getRelLevelSkill() as $searched_skill_id => $searched_level_id)
                    <div class="p-formGroupUnit--2col__itemForSkill js-content js-remove">
                        <label class="p-formGroupUnit--2col__label" for="">
                            <select name="skill_ids[]" id="skill_id" class="c-input">
                                <option value="">選択してください</option>
                                @foreach($response->getSkills() as $skill)
                                    <option
                                        value="{{ $skill->id }}" {{ $searched_skill_id === $skill->id ? 'selected' : '' }}>{{ $skill->name }}</option>
                                @endforeach
                            </select>
                        </label>

                        <label class="p-formGroupUnit--2col__label--after" for="">
                            <select name="level_ids[]" id="" class="c-input">
                                <option value="">選択してください</option>
                                @foreach($response->getLevels() as $level)
                                    <option
                                        value="{{ $level->id }}" {{ $searched_level_id === $level->id ? 'selected' : '' }}>{{ $level->level }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                @endforeach
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
            <button type="submit"
                    class="c-button--secondary p-searchBox__button js-project_search u-db u-m0a u-w-15-pc u-mt-30 js-project_search">
                検索
            </button>
            <div class="p-searchBox">
                <button type="submit" name="status" class="c-button u-m0a u-mt-30 u-w-15" value="1">今月営業開始</button>
                <button type="submit" name="status" class="c-button u-m0a u-mt-30 u-w-15" value="2">未営業</button>
                <button type="submit" name="status" class="c-button u-m0a u-mt-30 u-w-15" value="3">新規稼働</button>
                <button type="submit" name="status" class="c-button u-m0a u-mt-30 u-w-15" value="4">既存稼働</button>
                <button type="submit" name="status" class="c-button u-m0a u-mt-30 u-w-15" value="5">今月面談</button>
            </div>
        </form>
        {{--  検索ボタン（dashboard連動）  --}}
        <p class="c-text u-mt-20">ユーザー数：<span class="c-text--bold">{{ $response->getUserCounts() }}</span>件</p>
        @include('admin.pages.user.list._RegularUserTable', ['response' => $response])
        {{ $response->getUsers()->appends(request()->query())->links('components.paginator') }}
        @if($response->getUserCounts() === 0)
            <p class="u-text--center u-mt-20 u-fs-20">関連するユーザーが見つかりませんでした。</p>
        @endif
    </div>

    @include('admin.footer.footer')
@endsection
