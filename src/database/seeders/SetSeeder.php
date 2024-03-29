<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Set;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $set_aidan = new Set;
        $set_aidan->owner_id = User::where('id', 1)->firstOrFail()->id;
        $set_aidan->set_title = "Dogs Quiz";
        $set_aidan->set_description = "A Quiz about dogs.";
        $set_aidan->category = "database-autogenerated-seeder";
        $set_aidan->creation_date = date('Y-m-d');
        $set_aidan->save();

        Set::factory()->count(30)->create([
            'owner_id' => $set_aidan->owner_id,
           ]);

    }
}
