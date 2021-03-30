<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Set;
use App\Models\TestModeResult;
use App\Http\Requests\SubmitTestResults;
use Carbon\Carbon;

class StudyModeController extends Controller
{
    public function StudyMode(Request $request, Set $set)
    {
        $this->authorize('view', $set);

        return view('study.flashcard-study-mode')->with('set', $set);
    }

    public function TestMode(Request $request, Set $set)
    {
        $this->authorize('view', $set);

        return view('study.flashcard-test-mode')->with('set', $set);
    }

    public function TestModeComplete(SubmitTestResults $result, Set $set)
    {
        $this->authorize('view', $set);

        $testResult = new TestModeResult();
        $testResult->skipped_questions = $result->skipped_questions;
        $testResult->correct_answers = $result->correct_answers;
        $testResult->incorrect_answers = $result->incorrect_answers;
        $testResult->start_time = Carbon::parse($result->time)->setTimezone('Europe/London');
        $testResult->end_time = Carbon::now();
        $testResult->set_id = $set->id;
        $testResult->owner_id = auth()->user()->id;

        $testResult->save();

        return redirect("/flashcards/sets/" . $set->id . "/results/" . $testResult->id);
    }

    public function TestResult(Request $request, Set $set, TestModeResult $testResult)
    {
        $this->authorize('view', $set);

        return view('study.flashcard-test-mode-complete')->with('set', $set)->with('testResult', $testResult);
    }
}
