<!DOCTYPE html>
<html lang="ja">
<head>
  <meta content="IE=Edge" http-equiv="X-UA-Compatible">
  <meta charset="utf-8">
  <link rel="SHORTCUT ICON" href="/assets/images/favicon.ico">
  <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title')</title>
  @hasSection('description')
    <meta name="description" content="@yield('description')">
  @endif
  @hasSection('keywords')
    <meta name="keywords" content="@yield('keywords')">
  @endif
  @hasSection('robots')
    <meta name="robots" content="@yield('robots')">
  @endif
  @hasSection('canonical')
    <link rel="canonical" href="@yield('canonical')">
  @endif
  @section('stylesheet')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css2/style.css') }}" media="all">
  @show
  @section('head')
  @show
</head>
<body>
@section('body')
@show 

@section('script')
  <script src="{{ asset('/js/bundle.js') }}" type="text/javascript"></script>
@show
</body>
</html>
