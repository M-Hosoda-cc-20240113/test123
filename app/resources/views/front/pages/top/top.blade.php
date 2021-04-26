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
        <ul class="p-searchTab">
            <li class="p-searchTab__item js-tab is-active">スキルでさがす</li>
            <li class="p-searchTab__item js-tab">ポジションでさがす</li>
            <li class="p-searchTab__item js-tab">最寄り駅でさがす</li>
        </ul>

        <div class="p-checkboxUnit js-tab_content">
            @foreach($response->getSkills() as $skill)
                @include('atoms.Checkbox', ['text' => $skill->name, 'class' => 'p-checkboxUnit__item', 'name' => 'skill_ids[]'])
            @endforeach
        </div>
        {{--  skills  --}}

        <div class="p-checkboxUnit js-tab_content">
            @foreach($response->getPositions() as $position)
                @include('atoms.Checkbox', ['text' => $position->name, 'class' => 'p-checkboxUnit__item u-w-auto', 'name' => 'position_ids[]'])
            @endforeach
        </div>
        {{--  positions  --}}

        <div class="p-checkboxUnit js-tab_content">
            @foreach($response->getStations() as $station)
                @include('atoms.Checkbox', ['text' => $station->name, 'class' => 'p-checkboxUnit__item', 'name' => 'station_ids[]'])
            @endforeach
        </div>
        {{--  stations  --}}

        <button class="c-button u-db u-m0a u-mt-20 js-project_search" data-search-url="{{ route('front.project.search') }}">検索</button>

        <div class="p-cardUnit--col3 u-mt-30">
            @foreach($response->getProjects() as $project)
                @include('organisms.ProjectCard', $project)
            @endforeach
        </div>
        {{-- p-cardUnit--col3 --}}
    </div>

    @include('front.footer.footer')
@endsection
