<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SetCramResults extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {

        $oneMonthAgo = Carbon::now()->subDays(31);
        $dates = [];

        for ($i=1 ; $i < 32; $i++) {
          $newDate = $oneMonthAgo->add(1, 'day');
          array_push($dates, $newDate->format("d/m/Y"));
        }

        //dd($dates);

        return Chartisan::build()
            ->labels($dates)
            ->dataset('Sample', [1, 2, 3]);

}
}
