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
    </div>
@endsection
