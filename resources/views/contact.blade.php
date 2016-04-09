@extends('navbar')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="contact-left">
                    <h3 style="padding: 30px 0;">{{ trans('strings.contact_us') }}<div class="black_"></div></h3>
                    <h1>{{ trans('strings.lets_chat') }}</h1>
                    
                    @if($errors->any())
                        <ul class = "validation-errors">
                        @foreach($errors->getMessages() as $messages)
                            @foreach($messages as $message)
                                <li> {{ $message }} </li>
                            @endforeach
                        @endforeach
                        </ul>
                    @endif
                    
                    <form class="contact-form" method = "post" action = "{{URL::to('/')}}/contact/post">
                    
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                        <div class="form-name">
                            <input type="text" name = "name" placeholder = "{{ trans('strings.name') }}"/>
                        </div>
                        <div class="form-email">
                            <input type="text" name = "email" placeholder = "{{ trans('strings.email') }}"/>
                        </div>
                        <div class="form-message">
                            <textarea name = "message" placeholder = "{{ trans('strings.message') }}"></textarea>
                        </div>
                        <button>{{ strtoupper(trans('strings.send_message')) }}</button>
                    </form>

                </div>
            </div>
            <div class="col-md-7 contact-right">

                <div class="location">
                    <div class = "location-content">
                        @foreach (trans('strings.locations') as $location)
                            {{$location}}<br />
                        @endforeach
                    </div>
                </div>
                
                <div class="right-map" style="background-image:url(gfx/contact_map.png)">
                </div>
                
                <div class="right-photo" style="background-image:url(gfx/contact_photo.jpg)">
                </div>

            </div>
        </div>
    </div>
@endsection