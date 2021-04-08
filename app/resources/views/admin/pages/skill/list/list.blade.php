@php
/**
 * @var \App\Services\Admin\Skill\SkillList\SkillListResponse $response
 */
@endphp

@extends('admin.layout')

@section('title', 'スキル一覧|Aegis')

@section('body')
    @include('admin.header.header')
    <div class="Container mt-30">
      @include('admin.pages.skill.list._SkillTable', ['response' => $response])
    </div>

    @include('admin.footer.footer')
@endsection
