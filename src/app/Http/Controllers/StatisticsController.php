<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class StatisticsController extends Controller
{
    public function MyStatistics()
    {
        return view('statistics.index');
    }

}
