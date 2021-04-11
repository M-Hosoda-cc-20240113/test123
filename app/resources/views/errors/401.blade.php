@extends('errors.layout')

@section('title', '401|Aegis')

@section('body')
    @include('errors.header.header')
    <div class="Container mt-30">
        <a href="hoge">@include('atoms.Tag', ['component' => 'Tag--link', 'text' => "401 | Unauthorized", 'class' => 'mr-5 mb-5'])</a>
    </div>
    @include('errors.footer.footer')
@endsection
