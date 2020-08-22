@extends('treehouse')
@section('body')
    <div class="row mb-5">
        <div class="col-12 mb-3">
            <div class="card bg-white">
                <div class="card-body">
                    <h3 class="card-title">Welcome to the {{$track->title}} Track</h3>
                    <div class="row">
                        <p class="col-6 card-text d-none d-lg-block">{{$track->summary}} ✨</p>
                        <div class="col-6 mx-auto d-block">
                            <img src="{{asset('images/welcome-truck.png')}}" alt="welcome truck">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h4 class="mb-4">Open Courses</h4>
    <div class="row">
        @foreach($track->openCourses as $course)
            @include('course', ['course' => $course])
        @endforeach
    </div>
    <h4 class="mb-4">Already Completed</h4>
    <div class="row">
        @foreach($track->completedCourses as $course)
            @include('course', ['course' => $course])
        @endforeach
    </div>
@endsection
