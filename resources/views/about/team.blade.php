@extends('navar')

@section('content')
    <div class="container-fluid">
        <div class="row about-header">
            <div class="about-background"></div>
            <div class="col-md-9 left-text">
                
                <div class="about-text">
                    <h3 style="margin-bottom:40px;margin-top:5px;color:white">{{trans('strings.about_team')}}<div class="white_"></div></h3>
                    <h1>{{ trans('strings.our_mission') }}</h1>
                    <p>{{ trans('strings.our_mission_p1') }}<br />
                    {{ trans('strings.our_mission_p2') }}</p>
                </div>
            </div>
            <div class="col-md-3 right-menu">
                <div class="row ted">
                    <div class="col-md-12">
                        <span style="font-family:OpenSans-Extrabold;">TED<span style="position:relative;bottom:8px;font-size:0.75em">x</span></span>
                    </div>
                </div>
                <div class="row">
                     {{ trans('strings.team') }}
                </div>
                <div class="row ted active">
                    <span style="font-family:OpenSans-Extrabold;">TED<span style="position:relative;bottom:8px;font-size:0.75em">x</span></span>Eroilor
                </div>
                <div class="row">
                    {{ trans('strings.alumni')}}
                </div>
                <div class="row">
                    {{ trans('strings.boa') }}
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row member-list">
            <h3 style="padding: 30px 0;font-family:OpenSans-Semibold">{{ trans('strings.our_team') }}<div class="red_" style="width:50px;"></div></h3>
            
            @foreach($teamMembers as $teamMember) 
                <div class="col-md-3 team">
                <div class="member-photo" style="background-image:url(gfx/member1.png)"></div>
                <blockquote style="height:60px">
                    <b>{{$teamMember['name']}}</b><br />
                    {{$teamMember['position']}}<br />
                    {{$teamMember['email']}}<br />
                </blockquote>
                </div>
            @endforeach

        </div>
    </div>
@endsection