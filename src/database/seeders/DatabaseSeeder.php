<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Check if seeding the database is neccesary, and if not don't.
        // The command php artisan db:seed is run after every rebuild of dev, so this prevents the database being re-seeded completely over and over.
        if (User::where('email_address', '=', 'aidancrane78@gmail.com')->count() == 0) {
            $this->call(UserSeeder::class);
            $this->call(SetSeeder::class);
            $this->call(FlashcardSeeder::class);
         }
    }
}
