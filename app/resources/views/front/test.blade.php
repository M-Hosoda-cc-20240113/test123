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
        <nav>
            <ul class="p-paginator">
                <li class="p-paginator__item p-paginator__item--prev"><a class="p-paginator__link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewbox="0 0 8 12">
                            <g fill="none" fill-rule="evenodd">
                                <path fill="#33313C" d="M7.41 1.41L6 0 0 6l6 6 1.41-1.41L2.83 6z"></path>
                            </g>
                        </svg>
                    </a></li>
                <li class="p-paginator__item"><a class="p-paginator__link" href="#">...</a></li>
                <li class="p-paginator__item"><a class="p-paginator__link" href="#">1</a></li>
                <li class="p-paginator__item active"><a class="p-paginator__link" href="#">2</a></li>
                <li class="p-paginator__item"><a class="p-paginator__link" href="#">3</a></li>
                <li class="p-paginator__item"><a class="p-paginator__link" href="#">4</a></li>
                <li class="p-paginator__item"><a class="p-paginator__link" href="#">5</a></li>
                <li class="p-paginator__item"><a class="p-paginator__link" href="#">6</a></li>
                <li class="p-paginator__item"><a class="p-paginator__link" href="#">...</a></li>
                <li class="p-paginator__item p-paginator__item--next"><a class="p-paginator__link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewbox="0 0 8 12">
                            <g fill="none" fill-rule="evenodd">
                                <path fill="#33313C" d="M7.41 1.41L6 0 0 6l6 6 1.41-1.41L2.83 6z"></path>
                            </g>
                        </svg>
                    </a></li>
            </ul>
        </nav>
    </div>
@endsection
