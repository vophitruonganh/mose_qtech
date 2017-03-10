<!DOCTYPE html>
<html lang="vi">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="QMTech" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" type="text/css" href="{!! asset('bundles/styles.css') !!}" />
    <link rel="icon" href="{{ $cdn_domain_image }}/favicon.ico" type="image/x-icon" />
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="{{ $cdn_domain_plugin }}/html5shiv/html5shiv.min.js"></script>
      <script src="{{ $cdn_domain_plugin }}/respond/respond.min.js"></script>
    <![endif]-->
    <base href="{{ url('/') }}" />
    <title>@yield('titlePage') - Mose</title>
    <meta name="robots" content="noindex"/>
    <script type="text/javascript" src="{!! asset('bundles/main.js') !!}"></script>
</head>
<body>