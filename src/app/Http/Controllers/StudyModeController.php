<?php

namespace App\Http\Controllers;

use App\Charts\SetCramResults;
use Illuminate\Http\Request;
use App\Models\Set;
use App\Models\TestModeResult;
use App\Http\Requests\SubmitTestResults;
use Carbon\Carbon;
use Gate;

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

        Gate::authorize('view', Set::where('id', $set->id)->first());

        $chart = new SetCramResults;

        $oneMonthAgo = Carbon::now()->subMonths(1)->startOfDay();
        $dates = [];
        $correct_cards = [];
        $incorrect_cards = [];
        $skipped_cards = [];
        $test_count = [];

        for ($i = 1; $oneMonthAgo < Carbon::now(); $i++) {
          $curr = $oneMonthAgo->copy();
          array_push($dates, $oneMonthAgo->format("d/m/Y"));
          $oneMonthAgo->add(1, 'day');


          $test_results = TestModeResult::where('owner_id', auth()->user()->id)->where('set_id',  $set->id)->whereBetween('created_at', [$curr, $oneMonthAgo]);

          $local_correct_cards = 0;
          $local_incorrect_cards = 0;
          $local_skipped_cards = 0;
          $local_test_count = 0;

          foreach ($test_results->get() as $test) {
            $local_correct_cards += $test->correct_answers;
            $local_incorrect_cards += $test->incorrect_answers;
            $local_skipped_cards += $test->skipped_questions;
            $local_test_count++;
          }

          // if (!($oneMonthAgo < Carbon::now())) {
          //   dd($oneMonthAgo);
          // }

          array_push($correct_cards, $local_correct_cards);
          array_push($incorrect_cards, $local_incorrect_cards);
          array_push($skipped_cards, $local_skipped_cards);
          array_push($test_count, $local_test_count);


        }

        $chart->labels($dates);
        $chart->dataset('Correct Cards', 'bar', $correct_cards)->backgroundColor('#38c172');
        $chart->dataset('Incorrect Cards', 'bar', $incorrect_cards)->backgroundColor('#DC143C');
        $chart->dataset('Skipped Cards', 'bar',  $skipped_cards)->backgroundColor('#4299E1');
        $chart->dataset('Tests', 'line', $test_count)->backgroundColor('#EAEAEA')->fill(false);


        return view('study.flashcard-test-mode-complete')->with('set', $set)->with('testResult', $testResult)->with('chart', $chart);
    }
}
