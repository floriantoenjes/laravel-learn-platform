<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

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
        return view('tracks');
    }

    public function community() {
        return view('community');
    }
}
