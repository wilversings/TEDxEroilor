@extends('navbar')

@section('title')
Home
@endsection

@section('script')
window.underscore_element = 0;

$(function() {
    var points = [[100, 0], [0, 100], [100, 100]];
    $('#event-right').clipPath(points, {
        isPercentage: true
    });
});

@endsection

@section('content')
<div class="container">

    <div class="row upcoming-event">
        <div class="col-md-7 event-left">

            <h3 style="padding: 30px 0;">{{ trans("strings.upcoming_event") }}<div class="red_"></div></h3>

            <h2 class="event-title">
                {{ $event->name }}
            </h2>
            <p>
                {{ $event->description }}
            </p>

            <p style="font-family:OpenSans-Semibold">
                We look forward to seeing you there!
            </p>

            <div class="get-tickets">
                <button class="tedx-button">{{ strtoupper (trans("strings.get_tickets")) }}</button>
                <img src="events_type_img/{{$event->type}}" />
            </div>

        </div>
        <div class="col-md-5">

            <div class="cnt-down">
                <div class="event-countdown">
                    <span style="font-family:Roboto-Regular;font-size:1.3em">{{ $time }}</span><br />
                    <span style="font-family:Roboto-Regular;font-size:1.3em">{{ $date }}</span><br />
                    <div style="text-align:left; width:198px; margin-left:27px; position:relative">
                        <span style="font-family:Roboto-Black;font-size:1.6em;">DAYS & {{ $hoursLeft }} HOURS</span>
                        <div style="font-family:Roboto-Black;font-size:9em;margin: -16px 0"> {{ $daysLeft }}</div>
                        <span style="font-family:Roboto-Black;font-size:1.6em">LEFT</span><br />
                    </div>

                    @foreach(explode(PHP_EOL, $event->location) as $locationRow)
                        <span style="font-family:OpenSans-Semibold">{{ $locationRow }}</span><br />
                    @endforeach
                    
                </div>
                <a href = "" style="text-decoration:none;color:black">
                    <div class="get-directions">{{ strtoupper(trans("strings.get_directions")) }}</div>
                </a>
                
            </div>
            
            <div class="event-right" id="event-right" style="background-image:url(events_img/{{$event->id}})">
            </div>
        </div>
    </div>
</div>

<div class="container" >
    <div class="row pop-talks" style="margin-top:60px;">
        <h3 style="padding:30px 15px; width:200px">Popular Talks<div class="red_"></div></h3>


        <div class="col-md-3 video">
            <div style="background-image:url(gfx/video_preview_example1.png);width:240px;height:240px;display:block;position:relative">

            </div>
            <blockquote>
                <b>Nettie Hall</b><br />
                Shooting Stars
            </blockquote>
            <!--<img src="gfx/video_preview_example1.png" />-->
        </div>

        <div class="col-md-3 video">
            <div style="background-image:url(gfx/video_preview_example2.png);width:240px;height:240px;display:block;position:relative">
            </div>
            <blockquote>
                <b>Rosie Holloway</b><br />
                The History Of Astronomy
            </blockquote>
        </div>

        <div class="col-md-3 video">
            <div style="background-image:url(gfx/video_preview_example3.png);width:240px;height:240px;display:block;position:relative">
            </div>
            <blockquote>
                <b>Emilie Wong</b><br />
                The Basics Of Buying A Telescope
            </blockquote>
        </div>

        <div class="col-md-3 video">
            <div style="background-image:url(gfx/video_preview_example4.png);width:240px;height:240px;display:block;position:relative">
            </div>
            <blockquote>
                <b>Mike King</b><br />
                The Amazing Hubble
            </blockquote>
        </div>

    </div>
</div>

<div class="container">
    <div class="row">
        <h3 style="padding:15px 0 50px 15px">Highlights<div class="red_"></div></h3>

        <div class="col-md-6" style="padding-right:30px;">
            <iframe width="100%" height="250" src="http://www.youtube.com/embed/{{ Config::get('tedx.video_1') }}?controls=0&fs=0&iv_load_policy=3&rel=0&showinfo=0&theme=light&autohide=0&disablekb=1" frameborder="0">
            </iframe>

            <div class="subscribe">

                <!-- Begin MailChimp Signup Form -->

                <h2 style="font-family:PlayfairDisplay-Black">{{ trans("strings.subscribe_form_title") }}</h2>
                <p style="font-family:OpenSans-Regular">{{ trans("strings.subscribe_form_subtitle") }}</p>
                <form action="//tedxeroilor.us4.list-manage.com/subscribe/post?u=886959b5d711696097ada6951&amp;id=a4af1d48a0" method="post" name="mc-embedded-subscribe-form" class="subscribe-form" target="_blank" novalidate>
   
                    <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="{{ trans("strings.subscribe_form_email_placeholder") }}" required>
                    <span class="input-underscore"></span>
                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_886959b5d711696097ada6951_a4af1d48a0" tabindex="-1" value=""></div>
                    <input type="submit" value="{{ strtoupper(trans("strings.subscribe_form_button")) }}" name="subscribe" class="subscribe-submit">
                    
                </form>

                <!--End mc_embed_signup-->

            </div>

        </div>
        <div class="col-md-6" style="padding-left:30px;">
            <div class="row social-fetch">
                <div class="col-md-6">
                    <!-- Twitter last post -->

                    <div class="row">

                        <div class="col-md-2 social-fetch-icon-twitter"></div>
                        <div class="col-md-10 social-fetch-head">
                            Feb 11, 2016 {{ trans("strings.social_media_on") }} Twitter
                        </div>

                            <span class="social-fetch-text">
                                RT @VernonLund:<br />@SiyandaWrites @TEDxAms Thank you Sinyanda.A great and inspiding Tedx. You revive ...
                            </span>

                        </div>
                </div> <!-- Twitter last post end -->



                <div class="col-md-6">
                    <!-- Facebook last post -->

                    <div class="row">

                        <div class="col-md-2 social-fetch-icon-facebook"></div>
                        <div class="col-md-10 social-fetch-head">
                            {{ $fbDate }} {{ trans("strings.social_media_on") }} Facebook
                        </div>
                            <span class="social-fetch-text">
                                {{ $fbMessage }}
                            </span>
                         </div>



                </div> <!-- Facebook last post end-->
            </div>
            <!-- Video below begin -->
            <iframe width="100%" height="250" src="http://www.youtube.com/embed/{{ Config::get('tedx.video_2') }}?controls=0&fs=0&iv_load_policy=3&rel=0&showinfo=0&theme=light&autohide=0&disablekb=1" frameborder="0">
            </iframe>
        </div>
    </div>
</div>
@endsection