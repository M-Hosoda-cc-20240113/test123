@php
    /**
     * @var \App\Services\User\ShowEditSkillForm\ShowEditSkillFormResponse $response
     */
@endphp
@extends('front.layout')

@section('title', 'ユーザー情報編集|Aegis')

@section('body')
    @component('front.header.header', ['href' => route('front.index')])
        @include('front.header._link_login_logout')
    @endcomponent
    <div class="l-container--2col">
        <div class="l-sidebar">
            <ul class="p-list {{ $class ?? '' }}">
                <li class="c-text p-list__item--header">メニュー</li>
                <li class="p-list__item"><a class="c-text p-list__itemInner" href="{{ route('front.user.edit') }}">ユーザー情報編集</a>
                </li>
                <li class="p-list__item"><a class="c-text p-list__itemInner" href="{{ route('password.request') }}">パスワード変更</a>
                </li>
                <li class="p-list__item"><a class="c-text p-list__itemInner" href="{{ route('front.user.skill.form') }}">スキル編集</a>
                </li>
            </ul>
        </div>
        {{--  l-sidebar  --}}

        <div class="l-main">
            <div class="p-mainItem">

                <p class="p-level2Heading">スキル情報編集</p>

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <p class="c-text--warning">{{ $error }}</p>
                    @endforeach
                @endif

                <template id="skill_row">
                    <div class="p-formGroupUnit--2col__itemForSkill">
                        <label class="p-formGroupUnit--2col__label" for="">
                            <select name="skill_ids[]" id="" class="c-input">
                                @foreach($response->getSkills() as $skill)
                                    <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                @endforeach
                            </select>
                        </label>

                        <label class="p-formGroupUnit--2col__label--after" for="">
                            <select name="level_ids[]" id="" class="c-input">
                                @foreach($response->getLevels() as $level)
                                    <option value="{{ $level->id }}">{{ $level->level }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                </template>
                {{--   テンプレート    --}}

                <form class="js-form" action="{{ route('front.user.skill.edit') }}" method="post">
                    {{ @csrf_field() }}
                    <div class="p-formGroupUnit--2col">
                        @foreach($response->getRelLevelSkillUsers() as $level_skill)
                            @if ($loop->first)
                                <div class="p-formGroupUnit--2col__title">
                                    <p class="c-text">スキル</p>
                                    <p class="c-text u-pl-15">経験</p>
                                </div>
                            @endif

                            <div class="p-formGroupUnit--2col__itemForSkill">

                                <label class="p-formGroupUnit--2col__label" for="">
                                    <select name="skill_ids[]" id="skill_id" class="c-input">
                                        @foreach($response->getSkills() as $skill)
                                            <option
                                                value="{{ $skill->id }}" {{ $level_skill->name === $skill->name ? 'selected' : '' }}>{{ $skill->name }}</option>
                                        @endforeach
                                    </select>
                                </label>

                                <label class="p-formGroupUnit--2col__label--after" for="">
                                    <select name="level_ids[]" id="" class="c-input">
                                        @foreach($response->getLevels() as $level)
                                            <option
                                                value="{{ $level->id }}" {{ $level_skill->level === $level->level ? 'selected' : '' }}>{{ $level->level }}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                            {{--    itemForSkill      --}}
                        @endforeach
                    </div>
                    <img class="c-icon--clickable u-m0a js-add" src="/images/icons/icon_add.png" alt="">
                    <button type="submit" class="c-button u-db u-m0a u-mt-20">更新する</button>
                </form>
            </div>

        </div>
        {{--  l-main  --}}
    </div>

    @include('front.footer.footer')
@endsection
