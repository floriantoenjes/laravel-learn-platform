<?php


namespace App\Http\Controllers;


use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function library(Request $request) {
        $courses = Course::all();

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
        ]);
    }

    public function startCourse($id)
    {
        $course = Course::with('usersWhoStartedCourse')->find($id);
        $course->usersWhoStartedCourse()->attach(Auth::user()->id);
    }

    public function completeCourse($id)
    {
        $course = Course::with('usersWhoStartedCourse')->find($id);
        $pivot = $course->usersWhoStartedCourse()->find(Auth::user()->id)->pivot;
        $pivot->completed = true;
        $pivot->save();
    }
}
