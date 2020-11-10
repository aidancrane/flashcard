<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function Landing()
    {
        // Warning : You don't need to be logged in to see the landing page!
        return view('landing');
    }

    public function Dashboard()
    {
        return view('dashboard');
    }
}
