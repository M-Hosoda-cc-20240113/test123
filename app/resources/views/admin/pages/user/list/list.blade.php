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
        <div class="l-main">
            <div class="p-mainItem u-mt-20">
                @if($errors->all())
                    <p class="c-text--bold u-mt-20">検索条件が不正です。</p>
                    @foreach($errors->all() as $error)
                        <p class="c-text--warning">{{ $error }}</p>
                    @endforeach
                @endif
                <h2 class="p-level2Heading">ユーザー検索</h2>
                <form class="js-form" action="{{ route('user.search') }}" method="get">

                    <div class="p-formGroupUnit--2col">
                        <div class="p-formGroup p-formGroupUnit--2col__item--left u-pr-30pc">
                            <p class="c-text--bold">ユーザーカテゴリ</p>
                            <label class="c-select" for="">
                                <select name="" id="">
                                    <option value="">選択してください</option>
                                    <option value="">新規</option>
                                    <option value="">既存</option>
                                    <option value="">稼働中</option>
                                    <option value="">待機中</option>
                                </select>
                            </label>
                        </div>
                        <div class="p-formGroup p-formGroupUnit--2col__item u-pr-30pc">
                            <p class="c-text--bold">ステータス(今月)</p>
                            <label class="c-select" for="">
                                <select name="" id="">
                                    <option value="">選択してください</option>
                                    <option value="">営業開始</option>
                                    <option value="">未営業</option>
                                    <option value="">新規稼働</option>
                                    <option value="">既存稼働</option>
                                    <option value="">面談</option>
                                </select>
                            </label>
                        </div>
                    </div>

                    <div class="p-formGroupUnit--2col u-mt-20 u-ff-column js-parent">
                        <div class="p-formGroupUnit--2col__title">
                            <p class="c-text--bold">スキル</p>
                            <p class="c-text--bold u-pl-15">経験</p>
                        </div>
                        <div class="p-formGroupUnit--2col__itemForSkill js-content js-remove">
                            <label class="p-formGroupUnit--2col__label" for="">
                                <select name="skill_ids[]" id="skill_id" class="c-input">
                                    <option value="">選択してください</option>
                                    @foreach($response->getSkills() as $skill)
                                        <option
                                                value="{{ $skill->id }}">{{ $skill->name }}</option>
                                    @endforeach
                                </select>
                            </label>

                            <label class="p-formGroupUnit--2col__label--after" for="">
                                <select name="level_ids[]" id="" class="c-input">
                                    <option value="">選択してください</option>
                                    @foreach($response->getLevels() as $level)
                                        <option
                                                value="{{ $level->id }}">{{ $level->level }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                        {{--    itemForSkill      --}}
                        <img class="c-icon--clickable u-m0a js-add" src="/images/icons/icon_add.png" alt="">
                    </div>
                    {{--Level Skill--}}

                    <div class="p-formGroup">
                        <span class="c-text--bold">営業開始月</span>
                        <input class="c-input u-w-50-pc u-mt-5" name="operation_start_month" type="date" value="{{ old('operation_start_month') }}">
                    </div>
                    {{-- 営業開始月 --}}

                    <button type="submit" class="c-button u-mt-20 u-db u-w-30-pc u-m0a">検索</button>
                    {{--  検索ボタン（dashboard連動）  --}}
                </form>
            </div>
        </div>

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

        <p class="c-text u-mt-20">ユーザー数：<span class="c-text--bold">{{ $response->getUserCounts() }}</span>件</p>
        @include('admin.pages.user.list._RegularUserTable', ['response' => $response])
        {{ $response->getUsers()->appends(request()->query())->links('components.paginator') }}
        @if($response->getUserCounts() === 0)
            <p class="u-text--center u-mt-20 u-fs-20">関連するユーザーが見つかりませんでした。</p>
        @endif
    </div>

    @include('admin.footer.footer')
@endsection
