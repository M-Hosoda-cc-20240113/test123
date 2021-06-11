<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns#">
  @include('gtm._gtm_head')
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

{{-- ogp共通設定 --}}
  @hasSection('ogp_title')
    <meta property="og:title" content="@yield('ogp_title')">
  @endif
  @hasSection('ogp_type')
    <meta property="og:type" content="@yield('ogp_type')">
  @endif
  @hasSection('ogp_url')
    <meta property="og:url" content="@yield('ogp_url')">
  @endif
  @hasSection('ogp_image')
    <meta property="og:image" content="@yield('ogp_image')">
  @endif
  @hasSection('ogp_site_name')
    <meta property="og:site_name" content="@yield('ogp_site_name')">
  @endif
  @hasSection('ogp_description')
    <meta property="og:description" content="@yield('ogp_description')">
  @endif
  @hasSection('ogp_local')
    <meta property="og:local" content="@yield('ogp_local')">
  @endif
{{-- ogp Twitter設定 --}}
  @hasSection('twitter_card')
    <meta property="twitter:card" content="@yield('twitter_card')">
  @endif
  @hasSection('twitter_site')
    <meta property="twitter:site" content="@yield('twitter_site')">
  @endif
  @hasSection('twitter_creator')
    <meta property="twitter:creator" content="@yield('twitter_creator')">
  @endif


  @section('stylesheet')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}" media="all">
  @show
  @section('head')
  @show
</head>
<body data-route-name="{{ \Route::currentRouteName() }}">
@include('gtm._gtm_body')
@section('body')
@show

@section('script')
  <script src="{{ asset('/js/bundle.js') }}" type="text/javascript"></script>
@show
</body>
</html>
