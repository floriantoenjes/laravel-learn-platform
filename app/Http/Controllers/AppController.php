<?php

namespace App\Http\Controllers;

use App\Track;
use App\Course;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $courses = Course::all();

        $difficulty = $request->input('difficulty');
        if ($difficulty) {
            $courses = $courses->where('difficulty', $difficulty);
        }

        $language = $request->input('language');
        if ($language) {
            $courses = $courses->where('language', $language);
        }

        return view('library', ['courses' => $courses]);
    }

    public function tracks() {
        $activeTrack = User::with('activeTrack')->find(Auth::user()->getAuthIdentifier())->activeTrack;

        return view('tracks', [
            'tracks' => Track::all(),
            'activeTrack' => $activeTrack
        ]);
    }

    public function trackDetail($id) {
        return view('track-detail', ['track' => Track::with('courses')->find($id)]);
    }

    public function switchTrack($id)
    {
        $currentUser = User::find(Auth::id());
        $currentUser->active_track_id = $id;
        $currentUser->save();
    }

    public function community() {
        return view('community');
    }
}
