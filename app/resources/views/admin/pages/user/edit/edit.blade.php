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

                <div class="p-register__row">
                    <span class="p-register__title c-text--bold">ステータス</span>
                    <div class="p-register__itemWrap">
                        <div class="p-register__item u-w-50-pc">
                            <label for="" class="c-select">
                                <select name="status" id="">
                                    <option value="1">未営業</option>
                                    <option value="2">面談待ち</option>
                                    <option value="3">結果待ち</option>
                                    <option value="4">稼働済み</option>
                                </select>
                            </label>
                        </div>
                    </div>
                </div>
                {{--  ステータス  --}}

                <div class="p-register__row">
                    <span class="p-register__title c-text--bold">営業開始月</span>
                    <div class="p-register__itemWrap--2col u-ff-row">
                        <div class="p-register__item u-w-25-pc u-w-50-sp">
                            <input type="date"
                                   class="c-input"
                                   name="operation_start_month"
                                   value="{{ $response->getUser()->operation_start_month ?? '' }}"
                                   placeholder="160">
                        </div>
                    </div>
                </div>
                {{--  営業開始月  --}}

                <div class="p-register__row">
                    <span class="p-register__title c-text--bold">面談予定日</span>
                    @foreach($response->getUser()->project_app as $project)
                        <span class="u-as-center u-pl-30 u-w-1000px">{{ $project->name ?? ''}}</span>
                        <div class="p-register__itemWrap--2col u-ff-row">
                            <div class="p-register__item u-w-25-pc u-w-50-sp">
                                <input type="date"
                                       class="c-input"
                                       name="interview_date"
                                       value="{{ $project->pivot->interview_date ?? '' }}">
                            </div>

                        </div>
                    @endforeach
                </div>

                {{--  面談予定日  --}}

                <div class="p-register__row">
                    <span class="p-register__title c-text--bold">稼働日</span>
                    @foreach($response->getUser()->project_assign as $project)
                        <span>{{ $project->name ?? ''}}</span>
                        <div class="p-register__itemWrap--2col u-ff-row">
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

                <button type="submit" class="c-button u-db u-m0a u-w-250px u-mb-20">登録</button>
            </form>
            {{--  p-register  --}}
        </div>
    </div>
    @include('admin.footer.footer')
@endsection
