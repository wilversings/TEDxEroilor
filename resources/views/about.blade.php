@extends('navbar')

@section('title')
About
@endsection

@section('script')
window.underscore_element = 1;
@endsection

@section('content')
    <div class="container">
        <div class="about-header">
            <div class="about-background"></div>
            <div class="col-lg-9 left-text">
                
                <div class="about-text">
                    <h3 style="margin-bottom:40px;margin-top:5px;color:white">
                        {{trans('strings.head_top_title_'.$entityName)}}
                        <div class="white_"></div>
                    </h3>
                    <h1>{{ trans('strings.head_title_'.$entityName) }}</h1>
                    <p>{{ trans('strings.head_p1_'.$entityName) }}<br />
                    {{ trans('strings.head_p2_'.$entityName) }}</p>
                </div>
            </div>
            <div class="col-md-3 right-menu">
                <div class="row ted">
                    <span style="font-family:OpenSans-Extrabold;">TED<span style="position:relative;bottom:8px;font-size:0.75em">x</span></span>
                </div>
                {!! $entityName!='teammember' ? '<a href = "team">' : '' !!}
                <div class="row {{ $entityName=='teammember' ? 'active' : '' }}">
                     {{ trans('strings.team') }}
                </div>
                </a>
                <div class="row ted">
                    <span style="font-family:OpenSans-Extrabold;">TED<span style="position:relative;bottom:8px;font-size:0.75em">x</span></span>Eroilor
                </div>
                {!! $entityName!='alumna' ? '<a href = "alumni">' : '' !!}
                <div class="row {{ $entityName=='alumna' ? 'active' : '' }}">
                    {{ trans('strings.alumni')}}
                </div>
                </a>
                {!! $entityName!='adivser' ? '<a href = "boa">' : '' !!}
                <div class="row {{ $entityName=='adviser' ? 'active' : '' }}">
                    {{ trans('strings.boa') }}
                </div>
                </a>
            </div>
        </div>
    
        <div class="member-list">
            
            <h3 style="padding: 30px 0;font-family:OpenSans-Semibold">
                {{ trans('strings.content_title_'.$entityName) }}
                <div class="red_" style="width:50px;"></div>
            </h3>
            
            @if ($entityName == 'teammember')
            
                @foreach($data as $entry)
                
                    <div class="col-md-3 team">
                    <div class="member-photo" style="background-image:url(../teammembers_img/{{$entry['id']}})"></div>
                    <blockquote style="height:60px">
                        <b>{{$entry['name']}}</b><br />
                        {{$entry['position']}}<br />
                        {{$entry['email']}}<br />
                    </blockquote>
                    </div>
                    
                @endforeach
                
            @elseif ($entityName == 'alumna')
                
                @foreach($data as $entry)
                
                    <div class="col-md-3 team">
                    <div class="member-photo" style="background-image:url(../alumni_img/{{$entry['id']}})"></div>
                    <blockquote style="height:40px">
                        <b>{{$entry['name']}}</b><br />
                        {{$entry['position']}}<br />
                    </blockquote>
                    </div>
                
                @endforeach
                
            @elseif ($entityName == 'adviser')
            
                @foreach($data as $entry)
                
                    <div class="col-md-3 team">
                    <div class="member-photo" style="background-image:url(../advisers_img/{{$entry['id']}})"></div>
                    <blockquote style="height:40px">
                        <b>{{$entry['name']}}</b><br />
                        {{$entry['position']}}<br />
                    </blockquote>
                    </div>
                
                @endforeach
                
            @endif

        </div>
    </div>
@endsection