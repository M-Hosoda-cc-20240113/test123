@php
  /**
   * @var \App\Services\Top\FetchTopData\FetchTopResponse $response
   */
@endphp

@extends('front.layout')

@section('title', '【Aegis(イージス)】フリーランス・ITエンジニアのための案件サイト')
@section('canonical', 'https://aegis-freelance.jp/')
@section('ogp_title', '【Aegis(イージス)】')
@section('ogp_type', 'website')
@section('ogp_url', 'https://aegis-freelance.jp/')
@section('ogp_image', "{{ asset('/images/hero/hero_02.png') }}")
@section('ogp_site_name', 'Aegis')
@section('ogp_description', '【Aegis(イージス)】はフリーランス・ITエンジニアのための案件サイトです。meetupや勉強会など様々なイベントも開催しています！')
@section('ogp_local', 'ja_JP')
@section('twitter_card', 'summary')
@section('twitter_creator', '@aegis_freelance')

@section('body')
  @component('front.header.header', ['href' => route('front.index')])
    @include('front.header._link_admin_top')
    @include('front.header._link_mypage')
    @include('front.header._link_login_logout')
  @endcomponent

  @include('front.pages._drawer_contents')

  <div class="l-container">
    <img src="{{ asset('/images/hero/hero_02.png') }}" alt="スマートなフリーランス像">

    <ul class="p-searchTab u-mt-30">
      <li class="p-searchTab__item js-tab is-active">スキル<span class="u-dn-sp">でさがす</span></li>
      <li class="p-searchTab__item js-tab">ポジション<span class="u-dn-sp">でさがす</span></li>
      <li class="p-searchTab__item js-tab">最寄り駅<span class="u-dn-sp">でさがす</span></li>
    </ul>

    <form action="{{ route('front.project.search') }}" method="get">
      <div class="p-checkboxUnit js-tab_content">
        @foreach($response->getSkills() as $skill)
          <label class="p-checkbox p-checkboxUnit__item">{{ $skill->name }}
            <input value="{{ $skill->id }}" name="skill_ids[]"
                   type="checkbox" @if(!\Route::is('front.index') && in_array($skill->id, $response->getSearchedSkillIds())){{ 'checked' }}@endif>
            <div class="p-checkbox__indicator"></div>
          </label>
        @endforeach
      </div>
      {{--  skills  --}}

      <div class="p-checkboxUnit js-tab_content">
        @foreach($response->getPositions() as $position)
          <label class="p-checkbox p-checkboxUnit__item">{{ $position->name }}
            <input value="{{ $position->id }}" name="position_ids[]"
                   type="checkbox" @if(!\Route::is('front.index') && in_array($position->id, $response->getSearchedPositionIds())){{ 'checked' }}@endif>
            <div class="p-checkbox__indicator"></div>
          </label>
        @endforeach
      </div>
      {{--  positions  --}}

      <div class="p-checkboxUnit js-tab_content">
        @foreach($response->getStations() as $station)
          <label class="p-checkbox p-checkboxUnit__item">{{ $station->name }}
            <input value="{{ $station->id }}" name="station_ids[]"
                   type="checkbox" @if(!\Route::is('front.index') && in_array($station->id, $response->getSearchedStationIds())){{ 'checked' }}@endif>
            <div class="p-checkbox__indicator"></div>
          </label>
        @endforeach
      </div>
      {{--  stations  --}}
      @if($errors->all())
        @foreach($errors->all() as $error)
          <p class="c-text--warning">{{ $error }}</p>
        @endforeach
      @endif
      <div class="p-searchBox u-mt-20">
        <input name="keyword" class="c-input--light p-searchBox__input js-search_input" type="text"
               value="{{ request()->input('keyword') }}"
               placeholder="PHP JavaScript">
        <button type="submit" class="c-button--secondary p-searchBox__button js-project_search"
                data-search-url="{{ route('front.project.search') }}">検索
        </button>
      </div>
    </form>

    <p class="c-text u-mt-20">案件数：<span class="c-text--bold">{{ $response->getProjectCounts() }}</span>件</p>

    <div class="p-cardUnit--col3 u-mt-30">
      @foreach($response->getProjects() as $project)
        @include('front.pages.top._ProjectCard', $project)
      @endforeach
    </div>
    {{ $response->getProjects()->appends(request()->query())->links('components.paginator') }}
    {{-- p-cardUnit--col3 --}}

    @if($response->getProjectCounts() === 0)
      <p class="u-text--center mt-30 u-fs-20">関連する求人・案件が見つかりませんでした。</p>
    @endif

    <div class="p-mainItem u-mt-30">
      <h2 class="p-level2Heading">よくあるご質問</h2>
      @include('front.pages.top._FAQ')
    </div>
  </div>


  @include('front.footer.footer')
@endsection
