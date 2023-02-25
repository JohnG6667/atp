<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'ATP-PHOTOGRAPHY') }}</title>
    <meta content="" name="description">
    <meta content="" name="author">
    <meta content="" name="keywords">
    <meta
        content="height=device-height, width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"
        name="viewport">
    <!-- Focus v1.3 || ex nihilo || August - September 2017 -->
    <!-- style start -->
    <link href="/css/plugins.css" media="all" rel="stylesheet" type="text/css">
    <link href="/css/style.css" media="all" rel="stylesheet" type="text/css"><!-- style end -->
    <!-- google fonts start -->
    <link
        href="http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900%7CMontserrat:400,700%7CPlayfair+Display+SC:400,400i,700,700i,900,900i"
        rel="stylesheet" type="text/css"><!-- google fonts end -->

    <!-- Styles -->
    @livewireStyles
</head>

<body>

    <!-- preloader start -->
    <div class="preloader-bg"></div>
    <div id="preloader">
        <div id="preloader-status">
            <div class="preloader-position loader">
                <span></span>
            </div>
        </div>
    </div>
    <!-- preloader end -->

    @livewire('navigation')

    <!-- Page Content -->

    {{ $slot }}

    <!-- to top arrow start -->
    <a class="page-scroll" href="#home">
        <div class="to-top-arrow">
            <span class="ion-ios-arrow-up"></span>
        </div>
    </a>
    <!-- to top arrow end -->

    @livewire('modal')
    @livewire('footer')

    <!-- scripts start -->
    <script src="https://maps.googleapis.com/maps/api/js" type="text/javascript"></script>
    <script src="/js/plugins.js" type="text/javascript"></script>
    <script src="/js/focus.js"></script>
    <!-- scripts end -->

    @stack('modals')

    @livewireScripts
</body>

</html>
