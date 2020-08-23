<?php

namespace App\Http\Controllers;

use App\Track;
use App\User;
use Illuminate\Support\Facades\Auth;

class TrackController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function tracks() {
        $activeTrack = User::with('activeTrack')->find(Auth::user()->getAuthIdentifier())->activeTrack;

        return view('tracks', [
            'tracks' => Track::all(),
            'activeTrack' => $activeTrack
        ]);
    }

    public function trackDetail($id) {
        return view('track-detail', [
            'track' => Track::with('courses')->find($id),
        ]);
    }

    public function switchTrack($id)
    {
        $currentUser = User::find(Auth::id());
        $currentUser->active_track_id = $id;
        $currentUser->save();
    }
}
