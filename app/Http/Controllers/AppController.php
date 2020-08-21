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

    public function index() {
        $activeTrack = User::with('activeTrack')->find(Auth::user()->getAuthIdentifier())->activeTrack;


        return view('home', [
            'track' => $activeTrack,
            'activeTrack' => $activeTrack
        ]);
    }

    public function library(Request $request) {
        $courses = Course::all();
        $completedCourseIds = $this->getCompletedCoursesByAuthUser();

        $difficulty = $request->input('difficulty');
        if ($difficulty) {
            $courses = $courses->where('difficulty', $difficulty);
        }

        $language = $request->input('language');
        if ($language) {
            $courses = $courses->where('language', $language);
        }

        return view('library', [
            'courses' => $courses,
            'completedCourseIds' => $completedCourseIds
        ]);
    }

    public function tracks() {
        $activeTrack = User::with('activeTrack')->find(Auth::user()->getAuthIdentifier())->activeTrack;

        return view('tracks', [
            'tracks' => Track::all(),
            'activeTrack' => $activeTrack
        ]);
    }

    public function trackDetail($id) {
        $completedCourseIds = $this->getCompletedCoursesByAuthUser();

        return view('track-detail', [
            'track' => Track::with('courses')->find($id),
            'completedCourseIds' => $completedCourseIds
        ]);
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

    /**
     * @return array
     */
    public function getCompletedCoursesByAuthUser(): array
    {
        $completedCourses = Auth::user()->completedCourses;
        $completedCourseIds = [];
        foreach ($completedCourses as $completedCourse) {
            $completedCourseIds[] = $completedCourse->id;
        }
        return $completedCourseIds;
    }
}
