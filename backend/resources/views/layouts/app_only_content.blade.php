<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('/css/master.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/components.css') }}">

    <link rel="shortcut icon" href="/images/logo.ico">
</head>
<body class="app-only-container">
  {{-- icon画像 --}}
  <a href="{{route('top')}}" class="icon-img-link">
    <img src="/images/kakeibo_icon.svg" class="icon-img"/>
  </a>
  {{-- コンテンツ部分 --}}
  @yield('content')
</body>
</html>
