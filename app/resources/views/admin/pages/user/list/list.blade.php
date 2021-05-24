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

    <div class="c-modal js-modal"></div>

    <div class="l-container">
        @include('admin.bread_crumb._BreadCrumb')
        <div class="l-main">
            <div class="p-mainItem c-modal__content js-modal-content u-mt-20">
                <span class="c-modal__closeButtoon js-modal-close-button">×</span>
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
                            <p class="c-text--bold">新規・既存</p>
                            <label class="c-select" for="">
                                <select name="is_new" id="">
                                    <option value="" {{ request()->input('is_new') === "" ? 'selected' : '' }}>
                                        選択してください
                                    </option>
                                    <option value="1" {{ request()->input('is_new') === '1' ? 'selected' : '' }}>新規
                                    </option>
                                    <option value="0" {{ request()->input('is_new') === '0' ? 'selected' : '' }}>既存
                                    </option>
                                </select>
                            </label>
                        </div>
                        <div class="p-formGroup p-formGroupUnit--2col__item u-pr-30pc">
                            <p class="c-text--bold">稼働中・待機中</p>
                            <label class="c-select" for="">
                                <select name="is_working" id="">
                                    <option value="" {{ request()->input('is_working') === '' ? "selected" : '' }}>
                                        選択してください
                                    </option>
                                    <option value="1" {{ request()->input('is_working') === '1' ? "selected" : '' }}>
                                        稼働中
                                    </option>
                                    <option value="2" {{ request()->input('is_working') === '2' ? "selected" : '' }}>
                                        待機中
                                    </option>
                                </select>
                            </label>
                        </div>
                    </div>
                    <div class="p-formGroup u-mt-30 u-w-50-pc u-pr-30pc">
                        <p class="c-text--bold">ステータス</p>
                        <label class="c-select" for="">
                            <select name="status" id="">
                                <option value="" {{ request()->input('status') === '' ? 'selected' : '' }}>
                                    選択してください
                                </option>
                                <option value="0" {{ request()->input('status') === "0" ? "selected" : '' }}>未営業
                                </option>
                                <option value="1" {{ request()->input('status') === "1" ? "selected" : '' }}>面談待ち
                                </option>
                                <option value="2" {{ request()->input('status') === "2" ? "selected" : '' }}>結果待ち
                                </option>
                                <option value="3" {{ request()->input('status') === "3" ? "selected" : '' }}>稼働済み
                                </option>
                            </select>
                        </label>
                    </div>
                    <div class="p-formGroupUnit--2col u-mt-20 u-ff-column js-parent">
                        <div class="p-formGroupUnit--2col__title">
                            <p class="c-text--bold">スキル</p>
                            <p class="c-text--bold u-pl-15">経験</p>
                        </div>
{{--                        @php $skill_ids_count[] = count(request()->input('skill_ids')) @endphp--}}
                        @for($i=0; $i<$response->getCountSkillLevel(); $i++)
                        <div class="p-formGroupUnit--2col__itemForSkill js-content js-remove">
                            <label class="p-formGroupUnit--2col__label" for="">
                                <select name="skill_ids[]" id="skill_id" class="c-input">
                                    <option value="">選択してください</option>
                                    @foreach($response->getSkills() as $skill)
                                        <option value="{{ $skill->id }}" {{ request()->input('skill_ids')[$i] == $skill->id ? 'selected' : '' }}>{{ $skill->name }}</option>
                                    @endforeach
                                </select>
                            </label>
                            <label class="p-formGroupUnit--2col__label--after" for="">
                                <select name="level_ids[]" id="" class="c-input">
                                    <option value="">選択してください</option>
                                    @foreach($response->getLevels() as $level)
                                        <option
                                            value="{{ $level->id }}" {{ request()->input('level_ids')[$i] == $level->id ? 'selected' : '' }}>{{ $level->level }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                        @endfor
                        {{--    itemForSkill      --}}
                        <img class="c-icon--clickable u-m0a js-add" src="/images/icons/icon_add.png" alt="">
                    </div>
                    {{--Level Skill--}}

                    <div class="p-formGroupUnit--2col">
                        <div class="p-formGroup p-formGroupUnit--2col__item--left u-pr-30pc">
                            <p class="c-text--bold">営業開始月</p>
                            <input class="c-input u-mt-5" name="operation_start_month" type="date"
                                   value="{{ request()->input('operation_start_month') }}">
                        </div>
                        <div class="p-formGroup p-formGroupUnit--2col__item--left u-pr-30pc">
                            <p class="c-text--bold">面談予定月</p>
                            <input class="c-input u-mt-5" name="interview_month" type="date"
                                   value="{{ request()->input('interview_month') }}">
                        </div>
                    </div>
                    {{-- 営業開始月・面談予定月 --}}

                    <div class="p-formGroup u-mt-30 u-w-50-pc u-pr-30pc">
                        <span class="c-text--bold">稼働月</span>
                        <input class="c-input" name="assign_month" type="date"
                               value="{{ request()->input('assign_month') }}">
                    </div>
                    {{-- 稼働月 --}}
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
        <span class="c-text u-mt-20">ユーザー数：<span class="c-text--bold">{{ $response->getUserCounts() }}</span>件</span>
        <span class="c-button--secondary u-ml-10 u-w-auto u-mt-20 js-modal-button">検索フィルター</span>
        @include('admin.pages.user.list._RegularUserTable', ['response' => $response])
        {{ $response->getUsers()->appends(request()->query())->links('components.paginator') }}
        @if($response->getUserCounts() === 0)
            <p class="u-text--center u-mt-20 u-fs-20">関連するユーザーが見つかりませんでした。</p>
        @endif
    </div>

    @include('admin.footer.footer')
@endsection
