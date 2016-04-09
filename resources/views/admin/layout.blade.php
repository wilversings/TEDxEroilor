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
    <link type="text/css" rel="stylesheet" href="{{ URL::to ('/') }}/css/admin-generic.css" />
</head>

</head>

<body>
@if(Auth::check())
    <nav class="navbar navbar-default main-navbar navbar-fixed-top">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#adminNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('administration-dashboard')}}">Admin's dashboard</a>
        </div>

        <div class="collapse navbar-collapse navbar-right" id="adminNavbar">
            <ul class="nav navbar-nav">
                <li class="navbar-button">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="">Items<span class="caret"></span></a>
                    <ul class="dropdown-menu item-menu">
                        <a href = "{{url('/administration-dashboard/alumni')}}"><li>Alumni</li></a>
                        <a href = "{{url('/administration-dashboard/advisers')}}"><li>Advisers</li></a>
                        <a href = "{{url('/administration-dashboard/speakers')}}"><li>Speakers</li></a>
                        <a href = "{{url('/administration-dashboard/events')}}"><li>Events</li></a>
                        <a href = "{{url('/administration-dashboard/partners')}}"><li>Partners</li></a>
                        <a href = "{{url('/administration-dashboard/partnership-types')}}"><li>Partnership types</li></a>
                        <a href = "{{url('/administration-dashboard/team-members')}}"><li>Team members</li></a>
                        <a href = "{{url('/administration-dashboard/admin-accounts')}}"><li>Admin accounts</li></a>
                    </ul>    
                </li>
                <li>
                    <a href="{{url('administration-dashboard/contact-entries')}}">Contact entries</a>
                </li>
                <li>
                    <a href="#">Static elements</a>
                </li>
                <li>
                    <a href="{{url('administration-dashboard/logout')}}">Logout</a>
                </li>
            </ul>
        </div>

    </div>
</nav>
@endif
@yield('content')