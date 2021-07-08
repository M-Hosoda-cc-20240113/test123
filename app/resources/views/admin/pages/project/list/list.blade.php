@php
  /**
   * @var \App\Services\AdminProject\ProjectList\ProjectListResponse $response
   */
@endphp

@extends('admin.layout')

@section('title', '案件一覧|Aegis')

@section('body')
  @component('admin.header.header', ['href' => route('admin.index')])
    @include('admin.header._link_front_top')
    @include('admin.header._link_mypage')
    @include('admin.header._link_login_logout')
  @endcomponent
  @include('admin.pages._drawer_contents')
  <div class="c-modal js-modal"></div>

  <div class="l-container">
    @include('admin.bread_crumb._BreadCrumb')
    <div class="l-main">
      <div class="p-mainItem c-modal__content js-modal-content u-mt-20">
        <span class="c-modal__closeButton js-modal-close-button">×</span>
        @if($errors->all())
          <p class="c-text--bold u-mt-20">検索条件が不正です。</p>
          @foreach($errors->all() as $error)
            <p class="c-text--warning">{{ $error }}</p>
          @endforeach
        @endif
        <h2 class="p-level2Heading">案件検索</h2>
        <form class="js-form" action="{{ route('project.list.search') }}" method="get">

          <div class="p-formGroupUnit--2col u-mt-20 u-ff-column js-parent">
            <div class="p-formGroupUnit--2col__title">
              <p class="c-text--bold">スキル</p>
              <p class="c-text--bold u-pl-15">ポジション</p>
            </div>
            @for($i=0; $i<$response->getCountPositionSkill(); $i++)
              <div class="p-formGroupUnit--2col__itemForSkill js-content js-remove">
                <label class="p-formGroupUnit--2col__label" for="">
                  <select name="skill_ids[]" id="skill_id" class="c-input">
                    <option value="">選択してください</option>
                    @foreach($response->getSkills() as $skill)
                      <option
                          value="{{ $skill->id }}" {{ request()->input('skill_ids')[$i] == $skill->id ? 'selected' : '' }}>{{ $skill->name }}</option>
                    @endforeach
                  </select>
                </label>
                <label class="p-formGroupUnit--2col__label--after" for="">
                  <select name="position_ids[]" id="" class="c-input">
                    <option value="">選択してください</option>
                    @foreach($response->getPositions() as $position)
                      <option
                          value="{{ $position->id }}" {{ request()->input('position_ids')[$i] == $position->id ? 'selected' : '' }}>{{ $position->name }}</option>
                    @endforeach
                  </select>
                </label>
              </div>
            @endfor
            {{--    itemForSkill      --}}
            <img class="c-icon--clickable u-m0a js-add" src="/images/icons/icon_add.png" alt="">
          </div>
          {{--Position Skill--}}

          <div class="p-formGroupUnit--2col">
            <div class="p-formGroup p-formGroupUnit--2col__item--left u-pr-30pc">
              <p class="c-text--bold">駅名</p>
              <label class="c-select" for="">
                <select name="station_ids[id]" id="station_id" class="c-input">
                  <option value="">選択してください</option>
                  @foreach($response->getStations() as $station)
                    <option
                        value="{{ $station->id }}" {{ request()->input('station_ids.id') == $station->id ? 'selected' : '' }}>{{ $station->name }}</option>
                  @endforeach
                </select>
              </label>
            </div>
            <div class="p-formGroup p-formGroupUnit--2col__item u-pr-30pc">
              <p class="c-text--bold">エリア名</p>
              <label class="c-select" for="">
                <select name="area_ids[id]" id="area_id" class="c-input">
                  <option value="">選択してください</option>
                  @foreach($response->getAreas() as $area)
                    <option
                        value="{{ $area->id }}" {{ request()->input('area_ids.id') == $area->id ? 'selected' : '' }}>{{ $area->name }}</option>
                  @endforeach
                </select>
              </label>
            </div>
          </div>
          {{-- station area --}}

          <div class="p-formGroup u-mt-50 u-w-100-pc">
            <p class="c-text--bold">フリーワード検索</p>
            <div class="p-searchBox u-mt-10">
              <input name="keyword" class="c-input--light p-searchBox__input js-search_input" type="text"
                     value="{{ request()->input('keyword') }}"
                     placeholder="PHP JavaScript">
            </div>
          </div>
          {{--  フリーワード検索  --}}

          <button type="submit" class="c-button u-mt-20 u-db u-w-30-pc u-m0a">検索</button>
          {{--  検索ボタン（dashboard連動）  --}}
        </form>
      </div>
    </div>
    {{--  モーダルコンテンツ  --}}
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
          <select name="position_ids[]" id="" class="c-input">
            <option value="">選択してください</option>
            @foreach($response->getPositions() as $position)
              <option value="{{ $position->id }}">{{ $position->name }}</option>
            @endforeach
          </select>
        </label>
      </div>
    </template>
    {{--   テンプレート    --}}

    <form action="{{ route('project.delete') }}" method="POST">
      {{ @csrf_field() }}
      <span class="c-text u-mt-20">案件数：<span
            class="c-text--bold">{{ $response->getProjectCounts() ?? 0 }}</span>件</span>
      <a href="{{ route('project.create.form') }}" class="c-button u-ml-10 u-w-auto u-mt-20">新規登録する</a>
      <span class="c-button--secondary u-ml-10 u-w-auto u-mt-20 js-modal-button">検索フィルター</span>
      <button type="submit" class="c-button--warning u-w-15 u-ml-10 u-mb-5 js-alert-button">削除</button>
      <label class="p-checkbox">
        <input type="checkbox" class="js-check-all">
        <div class="p-checkbox__indicator"></div>
        全選択
      </label>
      @include('admin.pages.project.list._RegularTable', ['response' => $response])
      {{ $response->getProjects()->appends(request()->query())->links('components.paginator') }}
      @if($response->getProjectCounts() === 0)
        <p class="u-text--center u-mt-20 u-fs-20">関連する案件が見つかりませんでした。</p>
      @endif
    </form>
  </div>

  @include('admin.footer.footer')
@endsection
