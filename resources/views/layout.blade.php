<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>Gochsheimer Carnevals Club</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>



    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>

    <!-- CSS Files -->
    <link href="/vendor/material-kit/assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="/vendor/material-kit/assets/css/material-kit.css" rel="stylesheet"/>
    <link href="/vendor/material-kit/assets/css/gcc.css" rel="stylesheet"/>
    <link href="/vendor/magnific-popup/magnific-popup.css" rel="stylesheet"/>

    @stack('scripts')
</head>

<body class="index-page">

@include('includes.navbar')

<div class="wrapper">
    @include('includes.header')

    <div class="main main-raised" id="app">
        @yield('content')
    </div>

    @include('includes.footer')
</div>

</body>
@include('includes.scripts')
</html>
