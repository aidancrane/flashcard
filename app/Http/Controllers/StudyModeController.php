<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Set;

class StudyModeController extends Controller
{
    public function Study(Request $request, Set $set)
    {
        $this->authorize('view', $set);

        return view('study.flashcard-study-mode')->with('set', $set);
    }
}
