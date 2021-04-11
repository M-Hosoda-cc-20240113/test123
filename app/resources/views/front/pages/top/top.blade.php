@extends('front.layout')

@section('title', 'トップページ|Aegis')

@section('body')
    @include('front.header.header')
    <div class="Container mt-30">
        @include('atoms.input', ['text' => 'フリーワードで探す'])
        @include('front.pages.top._ContentTab')
        <div class="welcome-Checkbox tab_content-js tab_active-js">
            @include('atoms.Checkbox', ['class' => 'mr-30', 'index' => 1, 'text' => 'PHP'])
            @include('atoms.Checkbox', ['class' => 'mr-30', 'index' => 2, 'text' => 'Anguler'])
            @include('atoms.Checkbox', ['class' => 'mr-30', 'index' => 3, 'text' => 'React.js'])
            @include('atoms.Checkbox', ['class' => 'mr-30', 'index' => 4, 'text' => 'Vue.js'])
            @include('atoms.Checkbox', ['class' => 'mr-30', 'index' => 5, 'text' => 'Javascript'])
            @include('atoms.Checkbox', ['class' => 'mr-30', 'index' => 6, 'text' => 'Python'])
        </div>
        <div class="welcome-Checkbox tab_content-js">
            @include('atoms.Checkbox', ['class' => 'mr-30', 'index' => 1, 'text' => 'huga'])
        </div>
        <div class="welcome-Checkbox tab_content-js">
            @include('atoms.Checkbox', ['class' => 'mr-30', 'index' => 6, 'text' => 'hoge'])
        </div>
        <div class="welcome-ProjectCard mt-30">
            @foreach ($response->getProjects() as $project)
                @include('front.pages.top._ProjectCard',$project)
            @endforeach
        </div>
    </div>

    @include('front.footer.footer')
@endsection
