@extends('front.layout')

@section('title', 'トップページ|Aegis')

@section('body')
    @include('front.header.header')
    <ul class="ContentTab mt-30">
        <li class="ContentTab__item--current">
            <a class="ContentTab__itemText" href="">スキルで探す</a>
        </li>
        <li class="ContentTab__item">
            <a class="ContentTab__itemText" href="">ポジションで探す</a>
        </li>
        <li class="ContentTab__item">
            <a class="ContentTab__itemText" href="">最寄り駅で探す</a>
        </li>
    </ul>
    <div class="Container mt-30">
        <div class="welcome-ProjectCard">
            @include('front.organisms.ProjectCard')
            @include('front.organisms.ProjectCard')
            @include('front.organisms.ProjectCard')
            @include('front.organisms.ProjectCard')
        </div>
    </div>

    @include('front.footer.footer')
@endsection