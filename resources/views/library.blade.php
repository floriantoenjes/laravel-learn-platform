@extends('treehouse')
@section('body')
    <div class="row mb-5">
        <div class="col-12 mb-3">
            <div class="card bg-white">
                <div class="card-body">
                    <h3 class="card-title">Welcome to the Library</h3>
                    <div class="row">
                        <p class="col-6 card-text d-none d-lg-block">This is the course catalog you will build, from scratch, in Treehouse's Laravel Basics course. Learn how to get started, connect a database, serve your app, migrate and seed a datatbase, create routes, controllers and models. See you there and as always, happy coding. ✨</p>
                        <div class="col-6 mx-auto d-block">
                            <img src="{{asset('images/welcome-truck.png')}}" alt="welcome truck">
                        </div>
                    </div>
                </div>
            </div>
            <div class="reset-btns row">
                @if(app('request')->input('language') && app('request')->input('difficulty'))
                    <div class="col-12">
                        <a class="btn btn-light mt-2" href="{{route("library")}}">All Courses</a>
                    </div>
                @endif
                @if(app('request')->input('language'))
                    <div class="col-6">
                        <a class="btn btn-light mt-2" href="{{route("library", ["difficulty" => app('request')->input('difficulty')])}}">Reset Language</a>
                    </div>
                @endif
                @if(app('request')->input('difficulty'))
                    <div class="col-6">
                        <a class="btn btn-light mt-2" href="{{route("library", ["language" => app('request')->input('language')])}}">Reset Difficulty</a>
                    </div>
                @endif
            </div>
        </div>
    @foreach($courses as $course)
        @include('course')
    @endforeach
    </div>
@endsection
