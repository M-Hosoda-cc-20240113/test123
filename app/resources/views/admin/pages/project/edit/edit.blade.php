@php
    /**
     * @var \App\Services\AdminProject\ShowEditProjectForm\ShowEditProjectFormResponse $response
     */
@endphp
@extends('front.layout')
@section('title', '案件編集|Aegis')

@section('body')
    @component('admin.header.header', ['href' => route('front.index')])
        @include('admin.header._link_login_logout')
    @endcomponent
    <div class="l-container">
        @include('admin.bread_crumb._BreadCrumb')
        <h2 class="c-text fs-20">案件情報編集</h2>
        <hr class="Horizontal">

        @if($errors->all())
            <p class="c-text--bold u-mt-20">以下のエラーを修正してください</p>
            @foreach($errors->all() as $error)
                <p class="c-text--warning">{{ $error }}</p>
            @endforeach
        @endif
        <div class="p-userRegister">
            <form action="{{ route('project.edit') }}" method="POST">
                {{ @csrf_field() }}
                <input type="hidden" name="project_id" value="{{ $response->getProject()->id }}">
                {{--   p-userRegisterRow   --}}
                <div class="p-userRegister__row">
                    <span class="c-text--bold p-userRegister__title u-mb-5-sp">会社名</span>
                    <div class="p-userRegister__inputUnitWrap">
                        <div class="p-userRegister__inputUnit--single u-w-50-pc">
                            <select class="c-input p-userRegister__input u-w-100-sp" name="agent_id" id="">
                                @foreach($response->getAgents() as $agent)
                                    <option
                                        value={{ $agent->id ?? ''}} {{ $response->getProject()->agent->id === $agent->id ? 'selected' : '' }}>{{ $agent->name ?? ''}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                {{--   p-userRegisterRow   --}}

                <div class="p-userRegister__row">
                    <span class="c-text--bold p-userRegister__title u-mb-5-sp">最寄り駅</span>
                    <div class="p-userRegister__inputUnitWrap">
                        <div class="p-userRegister__inputUnit--single u-w-50-pc">
                            <select class="c-input p-userRegister__input u-w-100-sp" name="station_id" id="">
                                @foreach($response->getStations() as $station)
                                    <option
                                        value={{ $station->id ?? ''}} {{ $response->getProject()->station->id === $station->id ? 'selected' : '' }}>{{ $station->name ?? ''}}</option>
                                @endforeach
                            </select>
                            <span class="c-text p-userRegister__inputName">駅</span>
                        </div>
                    </div>
                </div>

                {{--   p-userRegisterRow   --}}

                <div class="p-userRegister__row">
                    <span class="c-text--bold p-userRegister__title u-mb-5-sp">案件名※</span>
                    <div class="p-userRegister__inputUnitWrap">
                        <div class="p-userRegister__inputUnit--single u-w-50-pc">
                            <input class="c-input p-userRegister__input u-w-100-sp" type="text"
                                   name="name"
                                   value="{{ $response->getProject()->name ?? ''}}">
                            <span class="c-text p-userRegister__inputName">　</span>
                        </div>
                    </div>
                </div>

                {{--   p-userRegisterRow   --}}

                <div class="p-userRegister__row">
                    <span class="c-text--bold p-userRegister__title u-mb-5-sp">出勤回数</span>
                    <div class="p-userRegister__inputUnitWrap">
                        <div class="p-userRegister__inputUnit--single u-w-50-pc">
                            <span class="c-text p-userRegister__inputName">週</span>
                            <select class="c-input p-userRegister__input u-w-100-sp" name="weekly_attendance" id="">
                                @for($i = 1; $i<6; $i++ )
                                    <option
                                        value={{ $i }} {{ $response->getProject()->weekly_attendance === $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                            <span class="c-text p-userRegister__inputName">回</span>
                        </div>
                    </div>
                </div>

                {{--   p-userRegisterRow   --}}
                <div class="p-userRegister__row">
                    <span class="c-text--bold p-userRegister__title u-mb-5-sp">ポジション</span>
                    <div class="p-userRegister__inputUnitWrap--2col">
                        @foreach($response->getProject()->positions as $key => $projectPosition)
                            <div class="p-userRegister__inputUnit">
                                <select class="c-input p-userRegister__input u-w-100-sp" name="position_ids[]"
                                        id="">
                                    @foreach($response->getPositions() as $position)
                                        <option
                                            value={{ $position->id ?? ''}} {{ $projectPosition->id === $position->id ? 'selected' : '' }}>{{ $position->name ?? ''}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{--   p-userRegisterRow   --}}
                <div class="p-userRegister__row">
                    <span class="c-text--bold p-userRegister__title u-mb-5-sp">スキル</span>
                    <div class="p-userRegister__inputUnitWrap--2col">
                        @foreach($response->getProject()->skills as $key => $projectSkill)
                            <div class="p-userRegister__inputUnit">
                                <select class="c-input p-userRegister__input u-w-100-sp" name="skill_ids[]"
                                        id="">
                                    @foreach($response->getSkills() as $skill)
                                        <option
                                            value={{ $skill->id ?? ''}} {{ $projectSkill->id === $skill->id ? 'selected' : '' }}>{{ $skill->name ?? ''}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{--   p-userRegisterRow   --}}
                <div class="p-userRegister__row">
                    <span class="c-text--bold p-userRegister__title u-mb-5-sp">単価</span>
                    <div class="p-userRegister__inputUnitWrap--2col">
                        <div class="p-userRegister__inputUnit">
                            <input class="c-input p-userRegister__input" type="number"
                                   name="min_unit_price"
                                   value="{{ $response->getProject()->min_unit_price ?? ''}}">
                            <span class="c-text p-userRegister__inputName">〜</span>
                        </div>
                        <div class="p-userRegister__inputUnit">
                            <input class="c-input p-userRegister__input" type="number"
                                   name="max_unit_price"
                                   value="{{ $response->getProject()->max_unit_price ?? ''}}">
                            <span class="c-text p-userRegister__inputName">万円</span>
                        </div>
                    </div>
                </div>
                {{--   p-userRegisterRow   --}}

                <div class="p-userRegister__row">
                    <span class="c-text--bold p-userRegister__title u-mb-5-sp">就業時間</span>
                    <div class="p-userRegister__inputUnitWrap--2col">
                        <div class="p-userRegister__inputUnit">
                            <input class="c-input p-userRegister__input" type="text"
                                   name="work_start"
                                   value="{{ ViewHelper::timeReplace( $response->getProject()->work_start ?? '' )}}">
                            <span class="c-text p-userRegister__inputName">〜</span>
                        </div>
                        <div class="p-userRegister__inputUnit">
                            <input class="c-input p-userRegister__input" type="text" name="work_end"
                                   value="{{ ViewHelper::timeReplace( $response->getProject()->work_end ?? '' )}}">
                            <span class="c-text p-userRegister__inputName">　　</span>
                        </div>
                    </div>
                </div>
                {{--   p-userRegisterRow   --}}

                <div class="p-userRegister__row">
                    <span class="c-text--bold p-userRegister__title u-mb-5-sp">精算幅</span>
                    <div class="p-userRegister__inputUnitWrap--2col">
                        <div class="p-userRegister__inputUnit">
                            <input class="c-input p-userRegister__input" type="number"
                                   name="min_operation_time"
                                   value="{{ $response->getProject()->min_operation_time ?? ''}}">
                            <span class="c-text p-userRegister__inputName">〜</span>
                        </div>
                        <div class="p-userRegister__inputUnit">
                            <input class="c-input p-userRegister__input" type="number"
                                   name="max_operation_time"
                                   value="{{ $response->getProject()->max_operation_time ?? ''}}">
                            <span class="c-text p-userRegister__inputName">時間</span>
                        </div>
                    </div>
                </div>

                {{--   p-userRegisterRow   --}}

                <div class="p-userRegister__row">
                    <span class="c-text--bold p-userRegister__title u-mb-5-sp">案件内容※</span>
                    <div class="p-userRegister__inputUnitWrap">
                        <div class="p-userRegister__inputUnit--single u-w-50-pc">
                                    <textarea class="c-input p-userRegister__input " rows="5" cols="60"
                                              name="description">{{ $response->getProject()->description ?? ''}}</textarea>
                        </div>
                    </div>
                </div>
                {{--   p-userRegisterRow   --}}

                <div class="p-userRegister__row">
                    <span class="c-text--bold p-userRegister__title u-mb-5-sp">必須条件</span>
                    <div class="p-userRegister__inputUnitWrap">
                        <div class="p-userRegister__inputUnit--single u-w-50-pc">
                                    <textarea class="c-input p-userRegister__input u-w-100-sp" rows="5" cols="60"
                                              name="required_condition">{{ $response->getProject()->required_condition ?? ''}}</textarea>
                        </div>
                    </div>
                </div>

                {{--   p-userRegisterRow   --}}

                <div class="p-userRegister__row">
                    <span class="c-text--bold p-userRegister__title u-mb-5-sp">尚可条件</span>
                    <div class="p-userRegister__inputUnitWrap">
                        <div class="p-userRegister__inputUnit--single u-w-50-pc">
                                    <textarea class="c-input p-userRegister__input u-w-100-sp" rows="5" cols="60"
                                              name="better_condition">{{ $response->getProject()->better_condition ?? ''}}</textarea>
                        </div>
                    </div>
                </div>

                {{--   p-userRegisterRow   --}}

                <div class="p-userRegister__row">
                    <span class="c-text--bold p-userRegister__title u-mb-5-sp">案件特徴</span>
                    <div class="p-userRegister__inputUnitWrap">
                        <div class="p-userRegister__inputUnit--single u-w-50-pc">
                                    <textarea class="c-input p-userRegister__input u-w-100-sp" rows="5" cols="60"
                                              name="feature">{{ $response->getProject()->feature ?? ''}}</textarea>
                        </div>
                    </div>
                </div>
                {{--   p-userRegisterRow   --}}
                @include('atoms.Button', ['text' => '更新する', 'class' => 'u-w-200px u-db u-m0a'])
            </form>
        </div>
    </div>

    @include('admin.footer.footer')
@endsection
