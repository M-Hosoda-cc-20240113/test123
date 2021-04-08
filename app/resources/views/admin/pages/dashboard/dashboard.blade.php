@extends('admin.layout')

@section('title', 'ダッシュボード|Aegis')

@section('body')
    @include('admin.header.header')
    <div class="Container mt-30">
      @include('admin.pages.dashboard._RegularList')
    </div>

    @include('admin.footer.footer')
@endsection
