@php
  /**
   * @var \App\Services\Skill\SkillList\SkillListResponse $response
   */
@endphp

@extends('admin.layout')

@section('title', 'スキル一覧|Aegis')

@section('body')
  @component('admin.header.header', ['href' => route('admin.index')])
    @include('admin.header._link_front_top')
    @include('admin.header._link_mypage')
    @include('admin.header._link_login_logout')
  @endcomponent
  @include('admin.pages._drawer_contents')

  <div class="l-container">
    @include('admin.bread_crumb._BreadCrumb')
    <span class="c-text u-mt-20">スキル数：<span class="c-text--bold">{{ $response->getSkills()->count() ?? 0 }}</span>件</span>
    <a href="{{ route('skill.createForm') }}" class="c-button u-ml-10 u-w-auto u-mt-20">新規登録</a>
    @include('admin.pages.skill.list._SkillTable', ['response' => $response])
    {{ $response->getSkills()->links('components.paginator') }}
  </div>

  @include('admin.footer.footer')
@endsection
