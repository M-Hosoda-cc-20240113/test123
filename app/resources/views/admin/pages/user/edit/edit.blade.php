@php
    /**
     * @var \App\Services\AdminUser\ShowEditUserForm\ShowEditUserFormResponse $response
     */
@endphp
@extends('front.layout')
@section('title', 'ユーザー編集|Aegis')

@section('body')
    @component('admin.header.header', ['href' => route('front.index')])
        @include('admin.header._link_login_logout')
    @endcomponent
    <div class="l-container">
        @include('admin.bread_crumb._BreadCrumb')
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

                <div class="p-register__row" style="padding-top: 30px">
                    <span class="p-register__title c-text--bold">営業開始月</span>
                    <div class="p-register__itemWrap--2col u-ff-row">
                        <div class="p-register__item u-w-25-pc u-w-50-sp">
                            <input type="date"
                                   class="c-input"
                                   name="operation_start_month"
                                   value="{{ $response->getUser()->operation_start_month ?? '' }}">
                        </div>
                    </div>
                </div>
                {{--  営業開始月  --}}

                <div class="p-register__row">
                    <span class="p-register__title c-text--bold">ステータス</span>
                    @foreach($response->getUser()->project_status as $project)
                        <div class="" style="width: 40%">
                            <span>{{ $project->name }}</span>
                            <input type="hidden" name="project_status_ids[]" value="{{ $project->id }}">
                            <div class="p-register__item u-w-50-pc">
                                <label for="" class="c-select">
                                    <select name="statuses[]" id="">
                                        @for($i = 0; $i < 4; $i++)
                                            <option
                                                value="{{ $i }}" {{ $i === $project->pivot->status ? 'selected' : '0' }}>{{ ViewHelper::Status($i) }}</option>
                                        @endfor
                                    </select>
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{--  ステータス  --}}

                <div class="p-register__row">
                    <span class="p-register__title c-text--bold">面談予定日</span>
                    @foreach($response->getUser()->project_app as $project)
                        <div class="" style="width: 40%">
                            <span class="u-as-center u-w-1000px">{{ $project->name ?? ''}}</span>
                            <input type="hidden" name="project_interview_ids[]" value="{{ $project->id }}">
                            <div class="" style="width: 45%">
                                <input type="date"
                                       class="c-input"
                                       name="interview_dates[]"
                                       value="{{ $project->pivot->interview_date ?? '' }}">
                            </div>
                        </div>
                    @endforeach
                </div>

                {{--  面談予定日  --}}

                <div class="p-register__row">
                    <span class="p-register__title c-text--bold">稼働日</span>
                    @foreach($response->getUser()->project_assign as $project)
                        <div style="width: 90%; display: flex;">
                            <span class="p-register__title">{{ $project->name ?? ''}}</span>
                            <input type="hidden" name="project_assign_id" value="{{ $project->id }}">
                            <span class="u-as-center u-pl-30 u-w-70px">開始</span>
                            <div class="p-register__item u-w-25-pc u-w-50-sp">
                                <input type="date"
                                       class="c-input"
                                       name="assignment_start_date"
                                       value="{{ $project->pivot->assignment_start_date ?? '' }}">
                            </div>
                            <span class="u-as-center u-pl-30 u-w-70px">終了</span>
                            <div class="p-register__item u-w-25-pc u-w-50-sp">
                                <input type="date"
                                       class="c-input"
                                       name="assignment_end_date"
                                       value="{{ $project->pivot->assignment_end_date ?? '' }}">
                            </div>
                        </div>
                    @endforeach
                </div>
                {{--  稼働日  --}}


                <div class="p-register__row--spColumn">
                    <p class="p-register__title c-text--bold u-w-100-sp">備考</p>
                    <div style="width: 80%; display: flex;">
                        <div class="p-register__item">
                            <textarea class="c-input--light"
                                      name="remarks"
                                      id=""
                                      rows="10">{{ $response->getUser()->remarks ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
                {{--  備考欄  --}}

                <button type="submit" class="c-button u-db u-m0a u-w-250px u-mb-20">登録</button>
            </form>
            {{--  p-register  --}}
        </div>
    </div>
    @include('admin.footer.footer')
@endsection
