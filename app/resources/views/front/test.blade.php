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
        <div class="p-inputGroup">
            <p class="c-text p-inputGroup__title">項目名ですん</p>
            <input class="c-input p-inputGroup__item" type="text">
        </div>
    </div>
@endsection
