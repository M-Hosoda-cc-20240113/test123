@extends('admin.layout')

@section('title', 'ダッシュボード|Aegis')

@section('body')
    @include('admin.header.header')
    <div class="Container mt-30">
      @include('organisms.RegularList', ['class' => 'w-20'])
    </div>

    @include('admin.footer.footer')
@endsection