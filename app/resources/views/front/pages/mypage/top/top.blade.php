@php
  /**
   * @var \App\Services\User\UserPage\UserPageResponse $response
   */
@endphp
@extends('front.layout')

@section('title', 'マイページ ｜'.config('app.title.aegis_explain'))

@section('body')
  @component('front.header.header', ['href' => route('front.index')])
    @include('front.header._link_admin_top')
    @include('front.header._link_mypage')
    @include('front.header._link_login_logout')
  @endcomponent

  @include('front.pages._loader')
  @include('front.pages._drawer_contents')

  @if( is_null(Cookie::get('aegis_contact')))
    @if(!$response->getUser()->is_admin)
      <div class="c-modal js-modal"></div>
      <div class="l-main">
        <div class="p-mainItem c-modal__content js-modal-content">
          <span class="c-modal__closeButton js-modal-close-button">×</span>
          <h2 class="p-level2Heading">ありがとうございます。</h2>
          <div class="c-text--center">下記ボタンを押すことで直接担当に通知し、すぐに折り返し連絡いたします。</div>
          <form action="{{ route('front.user.contact') }}" method="POST">
            {{ @csrf_field() }}
            <button class="c-button u-db u-m0a u-mt-20 js-loading-button">今すぐ案件を探してもらう。</button>
          </form>
        </div>
        <button class="c-button u-db u-m0a u-mt-20 js-modal-button">今すぐ案件を探して欲しい方はこちら！！</button>
      </div>
    @endif
  @endif

  <div class="l-container--2col">
    @include('front.pages.mypage._sidebar')
    <div class="l-main">
      <div class="p-news">
        <ul class="p-news__list">
          @foreach($response->getNotes()->take(5) as $note)
            <li class="p-news__item">
              <a class="p-news__itemInner" href="{{ route('front.note.detail', ['note_id' => $note->id]) }}">
                <span class="p-news__itemInnerDeco u-mr-10">{{ ViewHelper::YmdReplace($note->created_at ?? today()) }}</span>
                <span class="Note__itemInnerDeco--txt">{{ $note->title ?? '' }}</span>
              </a>
            </li>
          @endforeach
        </ul>
      </div>

      <div class="p-mainItem u-mt-20">
        <p class="p-level2Heading">ユーザー情報</p>
        <table class="p-sideColumnTable @if(!$response->getUser()->is_admin) u-mb-30 @endif">
          <tbody>
          <tr>
            <th>氏名</th>
            <td>{{ $response->getUser()->sei ?? '' }}&#160;{{ $response->getUser()->mei ?? '' }}</td>
          </tr>
          <tr>
            <th>フリガナ</th>
            <td>{{ $response->getUser()->sei_kana ?? '' }}
              &#160;{{ $response->getUser()->mei_kana ?? '' }}</td>
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
            <td>{{ ViewHelper::BirthdayReplace($response->getUser()->birthday ?? '' )}}</td>
          </tr>
          <tr>
            <th>希望連絡時間</th>
            <td>{!! nl2br(e($response->getUser()->contact_time ?? '' ))!!}</td>
          </tr>

          @if(!$response->getUser()->is_admin)
            <tr>
              <th>保有ポイント</th>
              <td>{{ $response->getUser()->points ?? '' }} pt</td>
            </tr>
          @endif
          <tr>
            <th>招待コード</th>
            <td>
              @if(!$response->getUser()->invite_code)
                <a class="c-button u-w-30-pc js-loading-button" href="{{ route('front.user.create.invite_code') }}">招待コード発行</a>
              @endif
              {{ $response->getUser()->invite_code ?? '' }}
            </td>
          </tr>
          </tbody>
        </table>
        {{--   ユーザー情報   --}}

        @if(!$response->getUser()->is_admin)
          <p class="p-level2Heading u-mb-5">スキル</p>
          <div class="u-mb-30">
            @if($response->getRelLevelSkillUser()->count() === 0 )
              <p class="c-text">
                スキルが登録されていません。
                <a class="c-text--primary" href="{{ route('front.user.skill.form') }}">こちら</a>から登録をお願いします。
              </p>
            @endif
            @foreach($response->getRelLevelSkillUser() as $level_skill)
              <span class="c-label u-mt-5 u-mr-10">{{ $level_skill->skill->name }}（{{ $level_skill->level->level }})</span>
            @endforeach
          </div>
          {{--  スキル  --}}

          <p class="p-level2Heading">応募案件</p>
          <div class="u-mb-30">
            @if($response->getUser()->project_app->count() === 0 )
              <p class="c-text">応募していません。<a class="c-text--primary" href="{{ route('front.index') }}">こちら</a>から案件を探しましょう。
              </p>
            @endif
            @foreach($response->getUser()->project_app as $project)
              <a class="c-text--bold u-dib u-mt-10 u-indent-1"
                 href="{{ route('front.project.detail', ['project_id' => $project->id] )}}">・{{ $project->name ?? ''}}</a>
              <p class="c-text u-indent">
                面談予定日：{{ ViewHelper::YmdReplace($project->pivot->interview_date ?? '未定' )}}</p>
            @endforeach
          </div>
          {{--  応募案件  --}}

          <p class="p-level2Heading">稼働案件</p>
          <div class="u-mb-30">
            @if($response->getUser()->project_assign->count() === 0 )
              <p class="c-text">稼働していません。</p>
            @endif
            @foreach($response->getUser()->project_assign as $project)
              <a class="c-text--bold u-dib u-mt-10 u-indent-1"
                 href="{{ route('front.project.detail', ['project_id' => $project->id] )}}">・{{ $project->name ?? ''}}</a>
              <p class="c-text">
                稼働開始日：{{ ViewHelper::YmdReplace($project->pivot->assignment_start_date ?? '未定' )}}</p>
              <p class="c-text">
                稼働終了日：{{ ViewHelper::YmdReplace($project->pivot->assignment_end_date ?? '未定' )}}</p>
            @endforeach
          </div>
          {{--  応募案件  --}}
        @endif
      </div>
      {{--   p-mainItem   --}}
    </div>
    {{--  l-main  --}}
  </div>
  {{--  l-container--2col --}}
  @if(!Auth::getUser()->is_admin)
    @include('front.footer.footer')
  @else
    @include('admin.footer.footer')
  @endif
@endsection
