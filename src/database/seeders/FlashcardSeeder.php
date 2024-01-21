<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Set;
use App\Models\Flashcard;

class FlashcardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $set = Set::where('owner_id', 1)->firstOrFail();

        $flashcard = new Flashcard;
        $flashcard->front_text = "\n\nExample Text!\n\n![German Shepherd](https://s3.amazonaws.com/cdn-origin-etr.akc.org/wp-content/uploads/2017/11/22170353/German-Shepherd-Dog-running.jpg \"365x243\")\n\n";
        $flashcard->back_text = "German Shepherd";
        $flashcard->flashcard_order = 1;
        $flashcard->set_id = $set->id;
        $flashcard->save();

        $flashcard1 = new Flashcard;
        $flashcard1->front_text = "\n\nExample Text for Golden Retriever\n\n";
        $flashcard1->back_text = "Golden Retriever";
        $flashcard1->flashcard_order = 2;
        $flashcard1->set_id = $set->id;
        $flashcard1->save();

        $flashcard2 = new Flashcard;
        $flashcard2->front_text = "\n\nExample Text for Beagle\n\n";
        $flashcard2->back_text = "Beagle";
        $flashcard2->flashcard_order = 3;
        $flashcard2->set_id = $set->id;
        $flashcard2->save();

        $flashcard3 = new Flashcard;
        $flashcard3->front_text = "\n\nExample Text for Dachshund\n\n";
        $flashcard3->back_text = "Dachshund";
        $flashcard3->flashcard_order = 4;
        $flashcard3->set_id = $set->id;
        $flashcard3->save();

    }
}
