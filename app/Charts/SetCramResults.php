<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\TestModeResult;

class SetCramResults extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {

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



          $test_results = TestModeResult::whereBetween('created_at', [$curr, $oneMonthAgo]);

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

        return Chartisan::build()
            ->labels($dates)
            ->dataset('Correct Cards', $correct_cards)
            ->dataset('Incorrect Cards', $incorrect_cards)
            ->dataset('Skipped Cards', $skipped_cards)
            ->dataset('Tests', $test_count);

}
}
