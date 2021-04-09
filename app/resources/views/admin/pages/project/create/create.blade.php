@extends('admin.layout')

@section('title', '案件一覧|Aegis')

@section('body')
    @include('admin.header.header')
    <div class="Container mt-30">
      @include('admin.bread_crumb._BreadCrumb')
    </div>
    @include('admin.footer.footer')
@endsection