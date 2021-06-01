@php
    /**
     * @var \App\Services\AdminUser\ShowEditUserForm\ShowEditUserFormResponse $response
     */
@endphp
@extends('front.layout')
@section('title', 'ユーザー編集|Aegis')

@section('body')
    @component('admin.header.header', ['href' => route('admin.index')])
        @include('admin.header._link_front_top')
        @include('admin.header._link_mypage')
        @include('admin.header._link_login_logout')
    @endcomponent
    @include('admin.pages._drawer_contents')

    <div class="l-container">
        @include('admin.bread_crumb._BreadCrumb')
        <div class="l-main">
            <div class="p-mainItem">
                <h2 class="p-level2Heading">ユーザー情報編集</h2>
                @if($errors->all())
                    <p class="c-text--bold">以下のエラーを修正してください</p>
                    @foreach($errors->all() as $error)
                        <p class="c-text--warning">{{ $error }}</p>
                    @endforeach
                @endif
                <div class="p-register">
                    <form action="{{ route('user.edit') }}" method="post">
                        {{ @csrf_field() }}
                        <input type="hidden" name="user_id" value="{{ $response->getUser()->id }}">

                        <div class="p-register__row--spColumn">
                            <span class="p-register__title c-text--bold">営業開始月</span>
                            <div class="p-register__itemWrap">
                                @foreach($response->getUser()->project_app as $project)
                                    <div class="p-register__item u-ff-column u-mt-30">
                                        <span class="c-text--bold">{{ $project->name }}</span>
                                        <input type="hidden" name="project_operation_ids[]" value="{{ $project->id }}">
                                        <input type="date"
                                               class="c-input u-w-50-pc"
                                               name="operation_start_month[]"
                                               value="{{ $project->pivot->operation_start_month ?? '' }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        {{--  営業開始月  --}}

                        <div class="p-register__row--spColumn">
                            <span class="p-register__title c-text--bold">ステータス</span>
                            <div class="p-register__itemWrap">
                                @foreach($response->getUser()->project_status as $project)
                                    <div class="p-register__item u-ff-column u-mt-30">
                                        <span class="c-text--bold">{{ $project->name }}</span>
                                        <input type="hidden" name="project_status_ids[]" value="{{ $project->id }}">
                                        <label for="" class="c-select u-w-50-pc">
                                            <select name="statuses[]" id="">
                                                @for($i = 0; $i < 4; $i++)
                                                    <option
                                                        value="{{ $i }}" {{ $i === $project->pivot->status ? 'selected' : '0' }}>{{ ViewHelper::Status($i) }}</option>
                                                @endfor
                                            </select>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        {{--  ステータス  --}}

                        <div class="p-register__row--spColumn">
                            <span class="p-register__title c-text--bold">面談予定日</span>
                            <div class="p-register__itemWrap">
                                @foreach($response->getUser()->project_app as $project)
                                    <div class="p-register__item u-ff-column u-mt-30">
                                        <span class="c-text--bold">{{ $project->name }}</span>
                                        <input type="hidden" name="project_interview_ids[]" value="{{ $project->id }}">
                                        <input type="date"
                                               class="c-input u-w-50-pc"
                                               name="interview_dates[]"
                                               value="{{ $project->pivot->interview_date ?? '' }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        {{--  面談予定日  --}}

                        <div class="p-register__row--spColumn">
                            <span class="p-register__title c-text--bold u-w-100-sp">稼働日</span>

                            @if($response->getUser()->project_assign()->count() === 0)
                                <p class="c-text u-w-70-pc">案件確定後入力可能になります。</p>
                            @endif

                            <div class="p-register__itemWrap">
                                @foreach($response->getUser()->project_assign as $project)
                                    <div class="p-register__item u-ff-column u-mt-30">
                                        <span class="c-text--bold u-w-100-pc u-w-100-sp">{{ $project->name }}</span>
                                        <input type="hidden" name="project_assign_id" value="{{ $project->id }}">

                                        <div class="p-inputGroupUnit u-mt-10">
                                            <div class="p-inputGroup u-mr-10">
                                                <span class="p-inputGroup__title">開始</span>
                                                <input type="date"
                                                       class="c-input p-inputGroup__item"
                                                       name="assignment_start_date"
                                                       value="{{ $project->pivot->assignment_start_date ?? '' }}">
                                            </div>
                                            <div class="p-inputGroup u-mt-5-sp">
                                                <span class="p-inputGroup__title">終了</span>
                                                <input type="date"
                                                       class="c-input p-inputGroup__item"
                                                       name="assignment_end_date"
                                                       value="{{ $project->pivot->assignment_end_date ?? '' }}">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        {{--  稼働日  --}}


                        <div class="p-register__row--spColumn">
                            <p class="p-register__title c-text--bold u-w-100-sp">備考</p>
                            <div class="p-register__itemWrap">
                                <div class="p-register__item">
                            <textarea class="c-input--light"
                                      name="remarks"
                                      id=""
                                      rows="10">{{ $response->getUser()->remarks ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        {{--  備考欄  --}}

                        <div class="p-register__row--spColumn">
                            <p class="p-register__title c-text--bold u-w-100-sp">イージスポイント</p>
                            <div class="p-register__itemWrap">
                                <div class="p-register__item u-w-25-pc">
                                    <input class="c-input--light"
                                           name="points"
                                           value="{{ $response->getUser()->points ?? '' }}">
                                    <span class="u-as-center u-pl-10 u-w-100px u-fs-12">ポイント</span>
                                </div>
                            </div>
                        </div>
                        {{--  ステータス  --}}

                        <button type="submit" class="c-button u-db u-m0a u-w-15-pc u-mb-20">登録</button>
                    </form>
                    {{--  p-register  --}}
                </div>
                {{--     p-register      --}}
            </div>
        </div>
        {{--    l-main   --}}
    </div>
    @include('admin.footer.footer')
@endsection
