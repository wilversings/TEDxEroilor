
@extends('navbar')

@section('title')
Speakers
@endsection

@section('script')
window.underscore_element = 2;
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 speaker-board">
                <div class="speaker-board-image"></div>
                <div class="speaker-board-content">
                    <h3 style="margin-bottom:40px;margin-top:5px;color:white">{{trans('strings.head_top_title')}}<span style="margin-left:25px">{{ $nextEvent['date'] }}</span><div class="white_"></div></h3>
                    <h1>{{ $nextEvent['name'] }}</h1>
                    <p>
                        {{ $currentSpeaker }}
                    </p>
                    <button>{{strtoupper (trans('strings.read_more_button'))}}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row speaker-list">
            <h3 style="padding: 30px 0;font-family:OpenSans-Semibold">{{trans('strings.next_event_speakers')}}<div class="red_"></div></h3>

            @foreach ($nextEventSpeakers as $speaker)
            <a href= "{{ URL::to('/').'/speakers/'.$speaker['id'] }}" style="text-decoration:none;color:inherit">
                <div class="col-md-3">
                    <div class="speaker-photo" style="background-image: url({{URL::to('/')}}/speakers_img/{{$speaker['id']}});"></div>
                    <blockquote>
                        <b>{{$speaker['name']}}</b><br />
                        {{$speaker['description']}}
                    </blockquote>
                </div>
            </a>
            @endforeach
            
        </div>
        
        <div class="row speaker-list">
            <h3 style="padding: 30px 0;font-family:OpenSans-Semibold">{{trans('strings.previous_events_speakers')}}<div class="red_"></div></h3>
            
             @foreach ($previousEventsSpeakers as $speaker)
           
                <div class="col-md-3">
                    <div class="speaker-photo" style="background-image: url(speakers_img/{{$speaker['id']}});"></div>
                    <blockquote>
                        <b>{{$speaker['name']}}</b><br />
                        {{$speaker['description']}}
                    </blockquote>
                </div>
                
            @endforeach

        </div>
    </div>

@endsection