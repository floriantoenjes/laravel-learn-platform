<div id="track-{{ $track->id }}" class="col-lg-4 mb-3 {{ $activeTrack && $activeTrack->id == $track->id ? 'active-track' : 'inactive-track' }}">
    <div class="card m-0 bg-white" style="max-height: 300px; height:300px;">
        <div class="card-header" style="background-color:{{$track->language === 'JavaScript' ? '#3659a2' : ($track->language === 'Python' ? '#008297' : ($track->language === 'iOS' ? '#30826C' : ($track->language === 'C#' ? '#008297' : ($track->language === 'PHP' ? '#008297' : '#9F4B84'))))}}">
            @if($track->durationLeft === $track->duration)
                <p class="float-right text-white" ><b>{{$track->duration >= 120 ? round($track->duration / 60) . ' hours' : $track->duration . ' min'}}</b></p>
            @elseif($track->durationLeft === 0)
                <p class="float-right text-white" ><b>Completed</b></p>
            @else
                <p class="float-right text-white" ><b>{{$track->durationLeft >= 120 ? round($track->durationLeft / 60) . ' hours' : $track->durationLeft . ' min'}} left</b></p>
            @endif
            <p class="text-white mark-track-active"><b>Active</b></p>
        </div>

        <div class="card-body" style="max-height:175px; height:175px">
            <h6 class="m-0">Track</h6>
            <h5 class="m-0"><a href="{{route("trackDetail", ["id" => $track->id])}}">{{$track->title}}</a></h5>
            <p style="overflow:hidden; text-overflow:ellipsis; height:75px; max-height:75px" >{{$track->summary}}</p>
        </div>
        <div class="card-footer bg-white">
            <button class="btn rounded bg-white border-dark" style="border-radius:2em !important; color:{{$track->language === 'JavaScript' ? '#3659a2' : ($track->language === 'Python' ? '#008297' : ($track->language === 'iOS' ? '#30826C' : '#9F4B84'))}}" ><b>{{$track->language}}</b></button>
            <button class="btn rounded bg-white border-dark" style="border-radius:2em !important;"><b>{{$track->difficulty}}</b></button>
            <button class="btn rounded bg-white border-dark switch-btn" style="border-radius:2em !important; float: right"
                    onclick="switchTrack('{{ Request::url() }}', {{ $track->id }}, '{{ csrf_token() }}')"><b>Switch Track</b></button>
            <a href="{{route("trackDetail", ["id" => $track->id])}}" class="btn rounded bg-white border-dark resume-btn" style="border-radius:2em !important; float: right"><b>Resume Track</b></a>
        </div>
    </div>
</div>
