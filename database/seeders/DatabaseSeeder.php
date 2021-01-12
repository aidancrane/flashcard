<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Set;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $aidan = new User;
        $aidan->first_name = "Aidan";
        $aidan->last_name = "Crane";
        $aidan->username = "aidan";
        $aidan->friendly_name = "Aidan";
        $aidan->email_address = "aidancrane78@gmail.com";
        $aidan->email_verified_at = now();
        $aidan->password = Hash::make('password');
        $aidan->role = array('admin');
        $aidan->save();

        for ($k = 0 ; $k < 250; $k++) {
            $user = User::factory()->create();
            $user->username = $user->username . $k;
            Set::factory()->count(30)->create([
             'owner_id' => $user->id,
            ]);
            $user->save();
        }

        // \App\Models\User::factory(10)->create();
    }
}
