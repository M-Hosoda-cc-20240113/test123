@extends('front.layout')

@section('title', '新規登録|Aegis')

@section('body')
    @component('front.header.header', ['href' => route('front.index')])
    @endcomponent
    <div class="Container mt-30">
      @include('front.pages.register._step1', ['project_id' => $project_id])
    </div>
    @include('front.footer.footer')
@endsection
