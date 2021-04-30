@extends('front.layout2')

@section('title', 'トップページ|Aegis')

@section('body')
  <div class="l-header">
    @component('organisms.Header')
      @auth
        <li class="c-text--bold p-nav__item">
          <a class="c-text--bold" href=""
             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            ログアウト
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="post">
            {{ csrf_field() }}
          </form>
        </li>
      @endauth
      @guest
        <li class="c-text--bold p-nav__item">ログアウト</li>
      @endguest
    @endcomponent
  </div>
  <div class="l-container js-parent">
      <template>
          <div class="js-content">
              <span class="c-text--bold u-mr-10">コンテンツ</span><span class="c-text--bold js-remove">削除</span>
          </div>
      </template>
      <div class="js-content">
          <span class="c-text--bold u-mr-10">コンテンツ</span><span class="c-text--bold js-remove">削除</span>
      </div>
      <button class="c-button js-add">追加</button>
  </div>
@endsection
