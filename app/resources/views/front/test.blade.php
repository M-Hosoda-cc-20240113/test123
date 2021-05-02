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
    <div class="l-container">
        <div class="p-register">
            <div class="p-register__row">
                <span class="p-register__title c-text--bold">会社名</span>
                <div class="p-register__itemWrap">
                    <div class="p-register__item u-w-50-pc">
                        <label for="" class="c-select">
                            <select name="" id="">
                                <option value="">hoge</option>
                            </select>
                        </label>
                    </div>
                </div>
            </div>

            <div class="p-register__row">
                <span class="p-register__title c-text--bold">最寄り駅</span>
                <div class="p-register__itemWrap">
                    <div class="p-register__item u-w-50-pc">
                        <label for="" class="c-select">
                            <select name="" id="">
                                <option value="">hoge</option>
                            </select>
                        </label>
                    </div>
                </div>
            </div>

            <div class="p-register__row">
                <span class="p-register__title c-text--bold">案件名</span>
                <div class="p-register__itemWrap">
                    <div class="p-register__item u-w-50-pc">
                        <input class="c-input" type="text">
                    </div>
                </div>
            </div>

            <div class="p-register__row">
                <span class="p-register__title c-text--bold">出勤回数</span>
                <div class="p-register__itemWrap">
                    <div class="p-register__item u-w-50-pc">
                        <span class="p-register__itemPart c-text">週</span>
                        <label for="" class="c-select u-w-100px p-register__itemPart">
                            <select name="" id="">
                                <option value="">5</option>
                                <option value="">4</option>
                                <option value="">3</option>
                            </select>
                        </label>
                        <span class="p-register__itemPart c-text">回</span>
                    </div>
                </div>
            </div>

            <div class="p-register__row">
                <span class="p-register__title c-text--bold">ポジション</span>
                <div class="p-register__itemWrap">
                    <div class="p-register__item u-w-50-pc">
                        <label for="" class="c-select p-register__itemPart">
                            <select name="" id="">
                                <option value="">フロント</option>
                                <option value="">バックエンド</option>
                                <option value="">PM</option>
                            </select>
                        </label>
                    </div>
                </div>
            </div>

            <template>
                <div class="p-register__item--trash u-mt-20 js-content">
                    <label for="" class="c-select p-register__itemPart">
                        <select name="" id="">
                            <option value="">php</option>
                            <option value="">js</option>
                            <option value="">vue.js</option>
                        </select>
                    </label>
                </div>
            </template>

            <div class="p-register__row">
                <span class="p-register__title c-text--bold">スキル</span>
                <div class="u-w-70-pc u-w-70-sp">
                    <div class="p-register__itemWrap u-w-100-sp u-w-50-pc js-parent">
                        <div class="p-register__item--trash js-content js-remove">
                            <label for="" class="c-select p-register__itemPart">
                                <select name="" id="">
                                    <option value="">php</option>
                                    <option value="">js</option>
                                    <option value="">vue.js</option>
                                </select>
                            </label>
                        </div>

                        <img class="c-icon--clickable u-mt-20 u-m0a js-add" src="/images/icons/icon_add.png" alt="">
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
