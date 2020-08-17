@extends('treehouse')
@section('body')
    <div class="row">
        <div class="col-12 mb-3">
            <div class="card bg-white">
                <div class="card-body ">
                    <h3 class="card-title">Welcome to Tracks</h3>
                    <div class="row">
                        <p class="col-6 card-text">This is the tracks page.</p>
                        <div class="col-6">
                            <img src="{{asset('images/welcome-truck.png')}}" alt="welcome truck">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach($tracks as $track)
            {{$track->test}}
            <div class="col-lg-4 mb-3">
                <div class="card m-0 bg-white" style="max-height: 300px; height:300px;">
                    <div class="card-header" style="background-color:{{$track->language === 'JavaScript' ? '#3659a2' : ($track->language === 'Python' ? '#008297' : ($track->language === 'iOS' ? '#30826C' : ($track->language === 'C#' ? '#008297' : ($track->language === 'PHP' ? '#008297' : '#9F4B84'))))}}">
                        <p class="float-right text-white" ><b>{{$track->duration >= 120 ? round($track->duration / 60) . ' hours' : $track->duration . ' min'}}</b></p>
                        @if($activeTrack && $activeTrack->id == $track->id)
                            <p class="text-white"><b>Active</b></p>
                        @endif
                    </div>

                    <div class="card-body" style="max-height:175px; height:175px">
                        <h6 class="m-0">Track</h6>
                        <h5 class="m-0"><a href="{{route("trackDetail", ["id" => $track->id])}}">{{$track->title}}</a></h5>
                        <p style="overflow:hidden; text-overflow:ellipsis; height:75px; max-height:75px" >{{$track->summary}}</p>
                    </div>
                    <div class="card-footer bg-white">
                        <button class="btn rounded bg-white border-dark" style="border-radius:2em !important; color:{{$track->language === 'JavaScript' ? '#3659a2' : ($track->language === 'Python' ? '#008297' : ($track->language === 'iOS' ? '#30826C' : '#9F4B84'))}}" ><b>{{$track->language}}</b></button>
                        <button class="btn rounded bg-white border-dark" style="border-radius:2em !important;"><b>{{$track->difficulty}}</b></button>
                        @if(!$activeTrack || $activeTrack->id != $track->id)
                            <button class="btn rounded bg-white border-dark" style="border-radius:2em !important; float: right"
                            onclick="switchTrack('{{ Request::url() }}/{{ $track->id }}', '{{ csrf_token() }}')"><b>Switch Track</b></button>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
