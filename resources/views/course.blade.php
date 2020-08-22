<div class="col-lg-4 mb-3">
    <div class="card m-0 bg-white" style="max-height: 300px; height:300px;">
        <div class="card-header"
             style="background-color:{{$course->language === 'JavaScript' ? '#3659a2' : ($course->language === 'Python' ? '#008297' : ($course->language === 'iOS' ? '#30826C' : ($course->language === 'C#' ? '#008297' : ($course->language === 'PHP' ? '#008297' : '#9F4B84'))))}}">
            <p class="float-right text-white">
                <b>{{$course->duration >= 120 ? round($course->duration / 60) . ' hours' : $course->duration . ' min'}}</b>
            </p>
            @if($course->completedByUser)
                <p class="text-white">Completed</p>
            @endif
        </div>

        <div class="card-body" style="max-height:175px; height:175px">
            <h6 class="m-0">Course</h6>
            <h5 class="m-0">{{$course->title}}</h5>
            <p style="overflow:hidden; text-overflow:ellipsis; height:75px; max-height:75px">{{$course->summary}}</p>
        </div>
        <div class="card-footer bg-white">
            <a class="btn rounded bg-white border-dark" style="border-radius:2em !important; color:{{$course->language === 'JavaScript' ? '#3659a2' : ($course->language === 'Python' ? '#008297' : ($course->language === 'iOS' ? '#30826C' : '#9F4B84'))}}" href="{{route("library", ["language" => $course->language, "difficulty" => app('request')->input('difficulty')])}}"><b>{{$course->language}}</b></a>
            <a class="btn rounded bg-white border-dark" style="border-radius:2em !important;" href="{{route("library", ["difficulty" => $course->difficulty, "language" => app('request')->input('language')])}}"><b>{{$course->difficulty}}</b></a>
            <a class="btn rounded bg-white border-dark" style="border-radius:2em !important; float: right;"
                onclick="completeCourse({{ $course->id }}, '{{ csrf_token() }}')"><b>Complete</b></a>
        </div>
    </div>
</div>
