@php
  /**
   * @var \App\Services\AdminProject\ShowCreateProjectForm\ShowCreateProjectFormResponse $response
   */
@endphp

@extends('front.layout')

@section('title', '案件登録|Aegis')

@section('body')
  @component('admin.header.header', ['href' => route('admin.index')])
    @include('admin.header._link_front_top')
    @include('admin.header._link_mypage')
    @include('admin.header._link_login_logout')
  @endcomponent

  @include('admin.pages._drawer_contents')
  @include('admin.pages.js-select2.select2')
  <div class="c-modal js-modal"></div>

  <div class="l-container">
    @include('admin.bread_crumb._BreadCrumb')
    <div class="p-mainItem c-modal__content js-modal-content">
      <span class="c-modal__closeButton js-modal-close-button">×</span>
      @if($errors->all())
        @foreach($errors->all() as $error)
          <p class="c-text--warning">{{ $error }}</p>
        @endforeach
      @endif
      <h2 class="p-level2Heading">CSV案件一括登録</h2>
      <form action="{{ route('project.create.csv') }}" method="post" enctype="multipart/form-data">
        {{ @csrf_field() }}
        <div class="p-formGroup u-mt-20 u-mb-30">
          <div class="p-register__itemWrap u-mt-10-sp">
            <div class="p-register__item u-w-80-pc">
              <input name="csv_file" class="c-input" type="file" value="{{ old('csv_file') }}"
                     placeholder="ファイルを選択">
            </div>
          </div>
        </div>
        <button type="submit" class="c-button u-db u-m0a u-mb-20 u-w-15-pc">登録</button>
      </form>
    </div>
    {{--  CSV登録  --}}
    <div class="l-main u-mt-20">
      <div class="p-mainItem">
        <h2 class="p-level2Heading">新規案件情報入力<span
              class="c-button--secondary u-ml-10 u-w-auto js-modal-button">CSV一括登録</span></h2>

        @if($errors->all())
          <p class="c-text--bold">以下のエラーを修正してください</p>
          @foreach($errors->all() as $error)
            <p class="c-text--warning">{{ $error }}</p>
          @endforeach
        @endif

        <div class="p-register">
          <form action="{{ route('project.create') }}" method="post">
            {{ @csrf_field() }}
            <div class="p-register__row u-mt-20">
              <span class="p-register__title c-text--bold">会社名</span>
              <div class="p-register__itemWrap--2col">
                <div class="p-register__item u-w-50-pc">
                  <label for="" class="c-select">
                    <select class="js-select2" name="agent_id" id="">
                      <option value="">選択してください</option>
                      @foreach($response->getAgents() as $agent)
                        <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                      @endforeach
                    </select>
                  </label>
                </div>
                <div class="p-register__item u-w-50-pc u-as-center u-mt-10-sp">
                  <p class="c-text u-pl-10 u-w-100">登録は<a target="_blank" class="c-text--bold"
                                                          href="{{ route('agent.create.form') }}">こちら<img
                          class="p-image--gray" src="{{ asset('images/icons/icon_external_link.svg') }}" alt=""></a></p>
                </div>
              </div>
            </div>
            {{--  エージェント  --}}

            <div class="p-register__row">
              <span class="p-register__title c-text--bold">最寄り駅<span
                    class="c-label--warning c-label--rounded c-label--sm u-ml-10">必須</span></span>
              <div class="p-register__itemWrap--2col">
                <div class="p-register__item u-w-50-pc">
                  <label for="" class="c-select">
                    <select class="js-select2" name="station_id" id="">
                      <option value="">選択してください</option>
                      @foreach($response->getStations() as $station)
                        <option value="{{ $station->id }}">{{ $station->name }}</option>
                      @endforeach
                    </select>
                  </label>
                </div>
                <div class="p-register__item u-w-50-pc u-as-center u-mt-10-sp">
                  <p class="c-text u-pl-10 u-w-100">登録は<a target="_blank" class="c-text--bold"
                                                          href="{{ route('station.create.form') }}">こちら<img
                          class="p-image--gray" src="{{ asset('images/icons/icon_external_link.svg') }}" alt=""></a></p>
                </div>
              </div>
            </div>
            {{--  最寄り駅  --}}

            <div class="p-register__row--spColumn">
              <span class="p-register__title c-text--bold">案件名<span
                    class="c-label--warning c-label--rounded c-label--sm u-ml-10">必須</span></span>
              <div class="p-register__itemWrap u-mt-10-sp">
                <div class="p-register__item u-w-50-pc">
                  <input name="name" class="c-input" type="text" value="{{ old('name') }}"
                         placeholder="大規模総合ECサイト開発">
                </div>
              </div>
            </div>
            {{--  案件名  --}}

            <div class="p-register__row">
              <span class="p-register__title c-text--bold">出勤回数</span>
              <div class="p-register__itemWrap">
                <div class="p-register__item u-w-50-pc">
                  <span class="p-register__itemPart c-text">週</span>
                  <label for="" class="c-select u-w-100px p-register__itemPart">
                    <select name="weekly_attendance" id="">
                      <option value="5">5</option>
                      <option value="4">4</option>
                      <option value="3">3</option>
                      <option value="2">2</option>
                      <option value="1">1</option>
                    </select>
                  </label>
                  <span class="p-register__itemPart c-text">回</span>
                </div>
              </div>
            </div>
            {{--  出勤回数  --}}

            <template>
              <div class="p-register__item--trash u-mt-20 js-content js-remove">
                <label for="" class="c-select p-register__itemPart">
                  <select name="position_ids[]" id="">
                    <option value="">選択してください</option>
                    @foreach($response->getPositions() as $position)
                      <option value="{{ $position->id }}">{{ $position->name }}</option>
                    @endforeach
                  </select>
                </label>
              </div>
            </template>

            <div class="p-register__row">
              <span class="p-register__title c-text--bold">ポジション</span>
              <div class="u-w-70-pc u-w-70-sp">
                <div class="p-register__itemWrap u-w-90-sp u-w-50-pc js-parent">
                  <div class="p-register__item--trash js-content js-remove">
                    <label for="" class="c-select p-register__itemPart">
                      <select name="position_ids[]" id="">
                        <option value="">選択してください</option>
                        @foreach($response->getPositions() as $position)
                          <option value="{{ $position->id }}">{{ $position->name }}</option>
                        @endforeach
                      </select>
                    </label>
                  </div>
                  <img class="c-icon--clickable u-mt-20 u-m0a js-add" src="/images/icons/icon_add.png" alt="">
                </div>
              </div>
            </div>
            {{--  ポジション  --}}

            <template>
              <div class="p-register__item--trash u-mt-20 js-content js-remove">
                <label for="" class="c-select p-register__itemPart">
                  <select name="skill_ids[]" id="">
                    <option value="">選択してください</option>
                    @foreach($response->getSkills() as $skill)
                      <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                    @endforeach
                  </select>
                </label>
              </div>
            </template>

            <div class="p-register__row">
              <span class="p-register__title c-text--bold">スキル<span
                    class="c-label--warning c-label--rounded c-label--sm u-ml-10">必須</span></span>
              <div class="u-w-70-pc u-w-70-sp">
                <div class="p-register__itemWrap u-w-90-sp u-w-50-pc js-parent">
                  <div class="p-register__item--trash js-content js-remove">
                    <label for="" class="c-select p-register__itemPart">
                      <select name="skill_ids[]" id="">
                        <option value="">選択してください</option>
                        @foreach($response->getSkills() as $skill)
                          <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                        @endforeach
                      </select>
                    </label>
                  </div>
                  <img class="c-icon--clickable u-mt-20 u-m0a js-add" src="/images/icons/icon_add.png" alt="">
                </div>
              </div>
            </div>
            {{--  スキル  --}}

            <div class="p-register__row">
              <span class="p-register__title c-text--bold">単価</span>
              <div class="p-register__itemWrap--2col u-ff-row">
                <div class="p-register__item u-w-25-pc">
                  <input name="min_unit_price" value="{{ old('min_unit_price') }}" type="text"
                         class="c-input"><span class="u-as-center u-pl-10 u-w-70px">〜</span>
                </div>
                <div class="p-register__item u-w-25-pc u-mt-10-sp">
                  <input name="max_unit_price" value="{{ old('max_unit_price') }}" type="text"
                         class="c-input"><span class="u-as-center u-pl-10 u-w-70px">万円</span><span
                      class="c-label--warning c-label--rounded c-label--sm u-ml-10 u-as-center">必須</span>
                </div>
              </div>
            </div>
            {{--  単価  --}}

            <div class="p-register__row">
              <span class="p-register__title c-text--bold">就業時間</span>
              <div class="p-register__itemWrap--2col u-ff-row">
                <div class="p-register__item u-w-25-pc u-w-50-sp">
                  <input type="text"
                         name="work_start"
                         class="c-input"
                         value="{{ old('work_start') }}"
                         placeholder="10:00">
                  <span class="u-as-center u-pl-10 u-w-70px">〜</span>
                </div>
                <div class="p-register__item u-w-25-pc u-w-50-sp">
                  <input type="text"
                         name="work_end"
                         class="c-input"
                         value="{{ old('work_end') }}"
                         placeholder="19:00">
                </div>
              </div>
            </div>
            {{--  就業時間  --}}

            <div class="p-register__row">
              <span class="p-register__title c-text--bold">精算幅</span>
              <div class="p-register__itemWrap--2col u-ff-row">
                <div class="p-register__item u-w-25-pc">
                  <input type="text"
                         class="c-input"
                         name="min_operation_time"
                         value="{{ old('min_operation_time') }}"
                         placeholder="160">
                  <span class="u-as-center u-pl-10 u-w-70px">〜</span>
                </div>
                <div class="p-register__item u-w-25-pc u-mt-10-sp">
                  <input type="text"
                         class="c-input"
                         name="max_operation_time"
                         value="{{ old('max_operation_time') }}"
                         placeholder="200">
                  <span class="u-as-center u-pl-10 u-w-70px">時間</span><span
                      class="c-label--warning c-label--rounded c-label--sm u-ml-10 u-as-center">必須</span>
                </div>
              </div>
            </div>
            {{--  精算幅  --}}

            <div class="p-register__row--spColumn">
              <p class="p-register__title c-text--bold u-w-100-sp">案件内容<span
                    class="c-label--warning c-label--rounded c-label--sm u-ml-10 u-as-center">必須</span></p>
              <div class="p-register__itemWrap">
                <div class="p-register__item">
                            <textarea class="c-input--light"
                                      name="description"
                                      id=""
                                      rows="10">{{ old('description') }}</textarea>
                </div>
              </div>
            </div>
            {{--  案件内容  --}}

            <div class="p-register__row--spColumn">
              <p class="p-register__title c-text--bold u-w-100-sp">必須条件</p>
              <div class="p-register__itemWrap">
                <div class="p-register__item">
                            <textarea class="c-input--light"
                                      name="required_condition"
                                      id=""
                                      rows="10">{{ old('required_condition') }}</textarea>
                </div>
              </div>
            </div>
            {{--  必須条件  --}}

            <div class="p-register__row--spColumn">
              <p class="p-register__title c-text--bold u-w-100-sp">尚可条件</p>
              <div class="p-register__itemWrap">
                <div class="p-register__item">
                            <textarea class="c-input--light"
                                      name="better_condition"
                                      id=""
                                      rows="10">{{ old('better_condition') }}</textarea>
                </div>
              </div>
            </div>
            {{--  尚化条件  --}}

            <div class="p-register__row--spColumn">
              <p class="p-register__title c-text--bold u-w-100-sp">案件特徴</p>
              <div class="p-register__itemWrap">
                <div class="p-register__item">
                            <textarea class="c-input--light"
                                      name="feature"
                                      id=""
                                      rows="10">{{ old('feature') }}</textarea>
                </div>
              </div>
            </div>
            {{--  案件特徴  --}}

            <button type="submit" class="c-button u-db u-m0a u-mb-20 u-w-15-pc">登録</button>
          </form>
        </div>
        {{--  p-register  --}}
      </div>
    </div>
  </div>
  @include('admin.footer.footer')
@endsection
