@extends('admin.layout')

@section('title', '案件一覧|Aegis')

@section('body')
    @include('admin.header.header')
    <div class="Container mt-30">
    @include('organisms.ProjectDetailTable')
    </div>
    @include('admin.footer.footer')
@endsection
