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
  <div class="l-container--2col">
    <div class="l-sidebar">
      <ul class="p-list {{ $class ?? '' }}">
        <li class="c-text p-list__item--header">メニュー</li>
        <li class="p-list__item"><a class="c-text p-list__itemInner" href="{{ route('front.user.edit') }}">ユーザー情報編集</a>
        </li>
        <li class="p-list__item"><a class="c-text p-list__itemInner" href="{{ route('password.request') }}">パスワード変更</a>
        </li>
        <li class="p-list__item"><a class="c-text p-list__itemInner" href="{{ route('front.user.skill.edit') }}">スキル編集</a></li>
      </ul>
    </div>
    {{--  l-sidebar  --}}

    <div class="l-main">
      <div class="p-mainItem">
        <p class="p-level2Heading">ユーザー情報</p>
        <table class="p-sideColumnTable u-mb-30">
          <tbody>
          <tr>
            <th>氏名</th>
            <td>{{ $response->getUser()->sei ?? '' }}&#160;{{ $response->getUser()->mei ?? '' }}</td>
          </tr>
          <tr>
            <th>フリガナ</th>
            <td>{{ $response->getUser()->sei_kana ?? '' }}&#160;{{ $response->getUser()->mei_kana ?? '' }}</td>
          </tr>
          <tr>
            <th>メールアドレス</th>
            <td>{{ $response->getUser()->email ?? '' }}</td>
          </tr>
          <tr>
            <th>電話番号</th>
            <td>{{ $response->getUser()->tel ?? '' }}</td>
          </tr>
          <tr>
            <th>生年月日</th>
            <td>{{ ViewHelper::YmdReplace($response->getUser()->birthday ?? '' )}}</td>
          </tr>
          </tbody>
        </table>
        {{--   ユーザー情報   --}}

        <p class="p-level2Heading u-mb-5">スキル</p>
        <div class="u-mb-30">
          @foreach($response->getRelLevelSkillUser() as $level_skill)
            @include('atoms.Tag', ['text' => $level_skill->name.'（'.$level_skill->level.'）', 'class' => 'u-mr-5 u-mt-5'])
          @endforeach
        </div>
        {{--  スキル  --}}

        <p class="p-level2Heading">応募案件</p>
        <div class="u-mb-30">
          @foreach($response->getUser()->project_app as $project)
            <a class="c-text u-db u-mt-10"
               href="{{ route('front.project.detail', ['project_id' => $project->id] )}}">・{{ $project->name ?? ''}}</a>
          @endforeach
        </div>
        {{--  応募案件  --}}

        <p class="p-level2Heading">稼働案件</p>
        <div class="u-mb-30">
          @foreach($response->getUser()->project_assign as $project)
            <a class="c-text u-db u-mt-10"
               href="{{ route('front.project.detail', ['project_id' => $project->id] )}}">・{{ $project->name ?? ''}}</a>
          @endforeach
        </div>
        {{--  応募案件  --}}
      </div>
      {{--   p-mainItem   --}}
    </div>
    {{--  l-main  --}}
  </div>
  {{--  l-container--2col --}}

  @include('front.footer.footer')
@endsection
