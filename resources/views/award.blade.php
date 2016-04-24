@extends('navbar')

@section('title')
Award
@endsection

@section('script')
window.underscore_element = 3;
@endsection

@section('content')
<div id="apply" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Entry<div class="red_" style="width:30px;"></div></h3>
                    <h2>
                        <span style="font-family:OpenSans-Extrabold;color:#ee3223">TED<span class="x2">x</span></span>Eroilor 
                        <span style="font-family:PlayfairDisplay-Black">Award</span>
                    </h2>

                </div>
                <div class="modal-body">
                    <form>

                        <input placeholder="Name" />
                        <input placeholder="Project's Name" />
                        <input placeholder="Website" />
                        <input placeholder="Achievements & Contributions" />
                        <input placeholder="Your Name" />
                        <input placeholder="Phone Number" />
                        <input placeholder="Email Address" />
                        <input class="tedx-button" type="submit" style="border:0;" />

                    </form>
                </div>
                
            </div>

        </div>
    </div>



    <div class="container">
        <div class="row award">

            <div class="col-md-6 award-left">
                <h3 style="margin-bottom:40px;margin-top:5px;">{{trans('strings.left_top_title')}}<div class="black_"></div></h3>

                <h1>{{trans('strings.left_title')}}</h1>
                
                @foreach (trans('strings.left_paragraphs') as $paragraph)
                    <p>{{$paragraph}}</p>
                @endforeach
                
                <button type="button" class="tedx-button" data-toggle="modal" data-target="#apply" style="margin-top:30px;">{{strtoupper(trans('strings.apply_button'))}}</button>

            </div>

            <div class="col-md-6 award-right">

                <a href="{{URL::to('/partners')}}">
                    <div class="banner">
                        {{strtoupper(trans('strings.right_banner'))}}
                    </div>
                </a>

                <span style="font-family:OpenSans-Semibold;position:absolute;margin: -30px 0 0 -40px;font-size:1.2em">ETAPE</span>
                
                <?php $stepIndex = 0 ?>
                @foreach (trans('strings.steps') as $step)
                
                    <div class="row"><div class="award-bullet">{{++$stepIndex}}</div>
                        <div class="award-step">
                            <b>{{$step['date']}}</b><br />
                            <span>{{$step['step']}}</span>
                        </div>
                    </div>
                    
                @endforeach

            </div>
        </div>
    </div>
@endsection