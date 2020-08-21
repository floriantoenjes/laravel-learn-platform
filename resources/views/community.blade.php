@extends('treehouse')
@section('body')
    <div class="row">
        <div class="col-12 mb-3">
            <div class="card bg-white">
                <div class="card-body ">
                    <h3 class="card-title">Welcome to the Community</h3>
                    <div class="row">
                        <p class="col-6 card-text">This is the community page.</p>
                        <div class="col-6">
                            <img src="{{asset('images/welcome-truck.png')}}" alt="welcome truck">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card p-4">
        <h3 class="mb-4">Leaderboard</h3>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Rank</th>
                <th scope="col">Username</th>
                <th scope="col">Completed Courses</th>
            </tr>
            </thead>
            <tbody>
            @foreach($rankedUsers as $index => $user)
                <tr>
                    <th scope="row">{{ $index +1 }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->completedCourses->count() }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
