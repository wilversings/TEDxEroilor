@extends('navbar')

@section('title')
Partners
@endsection

@section('script')
window.underscore_element = 5;
@endsection

@section('content')

<div class="container">

    <h3 style="padding: 30px 0;">{{ trans("strings.partners") }}<div class="black_"></div></h3>

    @foreach ($data as $partnershipType)
    
        <h1 style="font-size:{{$partnershipType['text_size']/10}}em">{{$partnershipType['name']}}</h1>
    
        <div class = "partners">
            @foreach ($partnershipType['partners'] as $partner)
                <img src="partners_img/{{$partner['id']}}" />
            @endforeach
        </div>
    
    @endforeach
    
</div>

@endsection