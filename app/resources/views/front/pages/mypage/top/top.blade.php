@php
    /**
     * @var \App\Services\User\UserPage\UserPageResponse $response
     */
@endphp
@extends('front.layout')

@section('title', 'トップページ|Aegis')

@section('body')
    @component('front.header.header', ['href' => route('front.index')])
        @include('front.header._link_login_logout')
    @endcomponent
    <div class="Container d-flex mt-30">
        <div class="SideBar">
            @include('front.pages.mypage.top._RegularList')
        </div>
        <div class="Main">
            <p class="fw-bold fs-20">ユーザー情報</p>
            <hr class="Horizontal">
            @include('front.pages.mypage.top._SideColumnTable', ['response' => $response])
            <p class="fw-bold fs-20 mt-20">スキル</p>
            <hr class="Horizontal">
            <div class="d-flex">
                @foreach($response->getRelLevelSkillUser() as $LevelSkill)
                    @include('atoms.Tag', ['text' => $LevelSkill->name.'（'.$LevelSkill->level.'）', 'class' => 'mr-10'])
                @endforeach
            </div>
            <p class="fw-bold fs-20 mt-20">応募案件</p>
            <hr class="Horizontal">
                @foreach($response->getUser()->project_app as $application)
                    <a class="fw-bold d-block" href="{{ route('front.project.detail', ['project_id' => $application->id] )}}">・{{$application->name ?? ''}}</a>
                @endforeach
            <p class="fw-bold fs-20 mt-20">稼働案件</p>
            <hr class="Horizontal">
                @foreach($response->getUser()->project_assign as $assignment)
                    <a class="fw-bold d-block" href="{{ route('front.project.detail', ['project_id' => $assignment->id] )}}">・{{$assignment->name ?? ''}}</a>
                @endforeach
        </div>
    </div>

    @include('front.footer.footer')
@endsection
