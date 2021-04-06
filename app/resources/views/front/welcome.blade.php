@extends('front.layout')

@section('title', 'トップページ|Aegis')

@section('body')
    @include('front.header.header')
    <div class="Container mt-30">
        @include('atoms.input', ['text' => 'フリーワードで探す'])
        @include('organisms.ContentTab')
        <div class="welcome-Checkbox">
            @include('atoms.Checkbox', ['class' => 'mr-30', 'index' => 1, 'text' => 'PHP'])
            @include('atoms.Checkbox', ['class' => 'mr-30', 'index' => 2, 'text' => 'Anguler'])
            @include('atoms.Checkbox', ['class' => 'mr-30', 'index' => 3, 'text' => 'React.js'])
            @include('atoms.Checkbox', ['class' => 'mr-30', 'index' => 4, 'text' => 'Vue.js'])
            @include('atoms.Checkbox', ['class' => 'mr-30', 'index' => 5, 'text' => 'Javascript'])
            @include('atoms.Checkbox', ['class' => 'mr-30', 'index' => 6, 'text' => 'Python'])
        </div>
        <div class="welcome-ProjectCard mt-30">
            @include('front.organisms.ProjectCard')
            @include('front.organisms.ProjectCard')
            @include('front.organisms.ProjectCard')
            @include('front.organisms.ProjectCard')
        </div>
    </div>

    @include('front.footer.footer')
@endsection