<?php

namespace App\Http\Controllers;

use App\User;
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

    public function community() {
        $rankedUsers = User::all();
        return view('community', [
            'rankedUsers' => $rankedUsers
        ]);
    }
}
