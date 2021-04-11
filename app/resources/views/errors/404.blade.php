@extends('errors.layout')

@section('title', '404|Aegis')

@section('body')
    @include('errors.header.header')
    <div class="Container mt-30">
        <a href="hoge">@include('atoms.Tag', ['component' => 'Tag--link', 'text' => "404 | ページが見つかりません", 'class' => 'mr-5 mb-5'])</a>
    </div>
    @include('errors.footer.footer')
@endsection
