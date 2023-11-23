<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aidan = new User;
        $aidan->first_name = "Aidan";
        $aidan->last_name = "Crane";
        $aidan->username = "aidan";
        $aidan->friendly_name = "Aidan";
        $aidan->email_address = "aidancrane78@gmail.com";
        $aidan->email_verified_at = now();
        $aidan->password = Hash::make('password');
        $aidan->save();

        for ($k = 0 ; $k < 250; $k++) {
            $user = User::factory()->create();
            $user->username = $user->username . $k;
            $user->save();
        }

    }
}
