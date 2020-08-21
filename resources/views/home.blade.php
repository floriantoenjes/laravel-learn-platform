@extends('treehouse')

@section('body')
    <div class="col-12 mb-3">
        <div class="card bg-white">
            <div class="card-body">
                <h3 class="card-title">Your Dashboard</h3>
                <div class="row">
                    <p class="col-6 card-text d-none d-lg-block">Have a look at your current progress.</p>
                    <div class="col-6 mx-auto d-block">
                        <img src="{{asset('images/welcome-truck.png')}}" alt="welcome truck">
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($activeTrack)
        @include('track')
    @endif
@endsection
