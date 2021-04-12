@extends('front.layout')

@section('title', 'トップページ|Aegis')

@section('body')
    @component('front.header.header', ['href' => route('front.index')])
    @endcomponent
    <div class="Container mt-30">
      @include('front.pages.register._step1')
    </div>
    @include('front.footer.footer')
@endsection
