@php
    /**
     * @var \App\Services\Skill\SkillList\SkillListResponse $response
     */
@endphp

@extends('admin.layout')

@section('title', 'スキル一覧|Aegis')

@section('body')
    @include('admin.header.header')
    <div class="l-container">
        @include('admin.bread_crumb._BreadCrumb')
        <a href="{{ route('skill.createForm') }}" class="c-button p-flex__item u-w-20 u-mt-15">新規登録</a>
        @include('admin.pages.skill.list._SkillTable', ['response' => $response])
        {{ $response->getSkills()->links('components.paginator') }}
    </div>

    @include('admin.footer.footer')
@endsection
