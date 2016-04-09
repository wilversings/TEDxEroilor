<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

    <link type="text/css" rel="stylesheet" href="{{ URL::to ('/') }}/css/fonts.css" />

    <link type="text/css" rel="stylesheet" href="{{ URL::to ('/') }}/css/generic.css" />

    <link type="text/css" rel="stylesheet" href="{{ URL::to ('/') }}/css/navbar-generic.css" />
    <link type="text/css" rel="stylesheet" href="{{ URL::to ('/') }}/css/footer-generic.css" />
    <link type="text/css" rel="stylesheet" href="{{ URL::to ('/') }}/css/home-generic.css" />
    <link type="text/css" rel="stylesheet" href="{{ URL::to ('/') }}/css/contact-generic.css" />
    <link type="text/css" rel="stylesheet" href="{{ URL::to ('/') }}/css/about-generic.css" />
    <link type="text/css" rel="stylesheet" href="{{ URL::to ('/') }}/css/award-generic.css" />
    <link type="text/css" rel="stylesheet" href="{{ URL::to ('/') }}/css/speakers-generic.css" />

    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Playfair+Display" />

    <script src="{{ URL::to ('/') }}/scripts/navbar.js"></script>
    <script src="{{ URL::to ('/') }}/scripts/home.js"></script>

    <title>TEDxEroilor | Home</title>

    <style>
    </style>

    <script>

    </script>

</head>

<body>

<nav class="navbar navbar-default main-navbar navbar-fixed-top">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{URL::to('/')}}"><img src="{{ URL::to ('/') }}/gfx/logo.png" /></a>
        </div>

        <div class="collapse navbar-collapse navbar-right" id="mainNavbar">
            <ul class="nav navbar-nav">
                <li><div class="social-icons">

                        <a href="{{URL::to('/toggleLocale')}}"><img src="{{ URL::to ('/') }}/gfx/{{ @App::getLocale() == "en" ? "ro" : "en" }}.png" /></a>

                    </div></li>
                <li><div class="social-icons">

                        <a href="#"><img src="{{ URL::to ('/') }}/gfx/twitter.png"></a>
                        <a href="#"><img src="{{ URL::to ('/') }}/gfx/facebook.png"></a>
                        <a href="#"><img src="{{ URL::to ('/') }}/gfx/instagram.png"></a>

                    </div></li>
                <li class="navbar-button" id="0"><a href="{{URL::to('/')}}">{{ trans("strings.home") }}</a><span class="red_ navbar-underscore" style="margin-top:-2px;"></span></li>
                <li class="navbar-button" id="1"><a class="navbar-button" id="1" href="{{URL::to('/about')}}">{{ trans("strings.about") }}<span class="ted">TED<span class="x">x</span></span></a></li>
                <li class="navbar-button" id="2"><a href="{{URL::to('/speakers')}}">{{ trans("strings.speakers") }}</a></li>

                <li class="navbar-button" id="3"><a href="{{URL::to('/award')}}"><span class="ted">TED<span class="x">x</span></span>Eroilor {{ trans("strings.award") }}</a></li>
                <li class="navbar-button" id="4"><a href="{{URL::to('/contact')}}">{{ trans("strings.contact") }}</a></li>
                <li class="navbar-button" id="5"><a href="{{URL::to('/partners')}}">{{ trans("strings.partners") }}</a></li>
            </ul>
        </div>

    </div>
</nav>

@yield('content')

<nav class="default-footer navbar navbar-default container">
    <ul class="nav navbar-nav">

        <li><a href="#">{{ trans("strings.home") }}</a></li>
        <li><a href="#">{{ trans("strings.about") }} <span class="ted">TED<span class="x">x</span></span></a></li>
        <li><a href="#">{{ trans("strings.speakers") }}</a></li>
        <li><a href="#"><span class="ted">TED<span class="x">x</span></span>Eroilor {{ trans("strings.award") }}</a></li>
        <li><a href="#">{{ trans("strings.contact") }}</a></li>
        <li><a href="#">{{ trans("strings.partners") }}</a></li>

    </ul>
    <div class="navbar-header navbar-right">
        <div class="navbar-brand">&copy; 2016 Copyright <span class="ted">TED<span class="x">x</span></span>Eroilor</div>
    </div>
</nav>

</body>

</html>