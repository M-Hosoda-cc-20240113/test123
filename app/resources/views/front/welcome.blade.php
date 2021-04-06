@extends('front.layout')

@section('title', 'トップページ|Aegis')

@section('body')
    @include('front.header.header')
    <div class="Container">
        <div class="welcome-ProjectCard">
            @include('front.organisms.ProjectCard')
            @include('front.organisms.ProjectCard')
            @include('front.organisms.ProjectCard')
            @include('front.organisms.ProjectCard')
        </div>
    </div>
    @include('front.footer.footer')
@endsection