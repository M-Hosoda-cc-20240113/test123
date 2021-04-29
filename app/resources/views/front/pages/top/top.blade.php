@php
    /**
     * @var \App\Services\Top\FetchTopData\FetchTopResponse $response
     */
@endphp

@extends('front.layout')

@section('title', 'トップページ|Aegis')

@section('body')
    @component('front.header.header', ['href' => route('front.index')])
        @include('front.header._link_mypage')
        @include('front.header._link_login_logout')
    @endcomponent

    <div class="l-container">
        @if($errors->all())
            <p class="c-text--bold u-mt-20">検索条件が不正です。</p>
            @foreach($errors->all() as $error)
                <p class="c-text--warning">{{ $error }}</p>
            @endforeach
        @endif

        <ul class="p-searchTab">
            <li class="p-searchTab__item js-tab is-active">スキルでさがす</li>
            <li class="p-searchTab__item js-tab">ポジションでさがす</li>
            <li class="p-searchTab__item js-tab">最寄り駅でさがす</li>
        </ul>

        <form action="{{ route('front.project.search') }}" method="get">
            <div class="p-checkboxUnit js-tab_content">
                @foreach($response->getSkills() as $skill)
                    <label class="p-checkbox p-checkboxUnit__item">{{ $skill->name }}
                        <input value="{{ $skill->id }}" name="skill_ids[]" type="checkbox" @if(!\Route::is('front.index') && in_array($skill->id, $response->getSearchedSkillIds())){{ 'checked' }}@endif>
                        <div class="p-checkbox__indicator"></div>
                    </label>
                @endforeach
            </div>
            {{--  skills  --}}

            <div class="p-checkboxUnit js-tab_content">
                @foreach($response->getPositions() as $position)
                    <label class="p-checkbox p-checkboxUnit__item">{{ $position->name }}
                        <input value="{{ $position->id }}" name="position_ids[]" type="checkbox" @if(!\Route::is('front.index') && in_array($position->id, $response->getSearchedPositionIds())){{ 'checked' }}@endif>
                        <div class="p-checkbox__indicator"></div>
                    </label>
                @endforeach
            </div>
            {{--  positions  --}}

            <div class="p-checkboxUnit js-tab_content">
                @foreach($response->getStations() as $station)
                    <label class="p-checkbox p-checkboxUnit__item">{{ $station->name }}
                        <input value="{{ $station->id }}" name="station_ids[]" type="checkbox" @if(!\Route::is('front.index') && in_array($station->id, $response->getSearchedStationIds())){{ 'checked' }}@endif>
                        <div class="p-checkbox__indicator"></div>
                    </label>
                @endforeach
            </div>
            {{--  stations  --}}
            <div class="p-searchBox u-mt-20">
                <input name="keyword" class="c-input p-searchBox__input js-search_input" type="text" value="" placeholder="PHP JavaScript">
                <button type="submit" class="c-button--secondary p-searchBox__button js-project_search" data-search-url="{{ route('front.project.search') }}">検索</button>
            </div>
        </form>

        <div class="p-cardUnit--col3 u-mt-30">
            @foreach($response->getProjects() as $project)
                @include('organisms.ProjectCard', $project)
            @endforeach
        </div>
        {{-- p-cardUnit--col3 --}}
    </div>

    @include('front.footer.footer')
@endsection
