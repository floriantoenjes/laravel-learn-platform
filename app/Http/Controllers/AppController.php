<?php

namespace App\Http\Controllers;

use App\Track;
use App\Course;
use App\User;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('library', ['courses' => Course::all()]);
    }

    public function tracks() {
        return view('tracks', [
            'tracks' => Track::all(),
            'activeTrack' => User::with('activeTrack')->find(Auth::user()->getAuthIdentifier())
        ]);
    }

    public function trackDetail($id) {
        return view('track-detail', ['track' => Track::with('courses')->find($id)]);
    }

    public function community() {
        return view('community');
    }
}
