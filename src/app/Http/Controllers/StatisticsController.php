<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Charts\FlashcardChart;
use App\Models\User;
use App\Models\TestModeResult;
use Gate;
use Carbon\Carbon;

class StatisticsController extends Controller
{
    public function MyStatistics()
    {
        $chart = new FlashcardChart;

        Gate::authorize('view', User::where('id', auth()->user()->id)->first());

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


            $test_results = TestModeResult::where('owner_id', auth()->user()->id)->whereBetween('created_at', [$curr, $oneMonthAgo]);

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

        //dd($dates);

        $chart->labels($dates);
        $chart->dataset('Correct Cards', 'bar', $correct_cards)->backgroundColor('#38c172');
        $chart->dataset('Incorrect Cards', 'bar', $incorrect_cards)->backgroundColor('#DC143C');
        $chart->dataset('Skipped Cards', 'bar', $skipped_cards)->backgroundColor('#4299E1');
        $chart->dataset('Tests', 'line', $test_count)->backgroundColor('#EAEAEA')->fill(false);

        return view('statistics.index', ['chart' => $chart]);
    }
}
