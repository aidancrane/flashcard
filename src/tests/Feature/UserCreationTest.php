<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Set;

class UserCreationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserIsAbleToMakeSets()
    {
        // Create a user so we pass authentication.
        $user = User::factory()->create();

        Set::factory()->create([
           'owner_id' => $user->id,
         ]);

        // Check user is able to make flashcard set.
        $sets = Set::where('owner_id', $user->id)->first();
        $this->assertNotNull($sets);

        // Check the endpoint is still working.
        $response = $this->actingAs($user)->get('/');

        // Delete user as no longer required and don't want to clutter database.
        $user->delete();
    }

    public function testUserSetIsDeletedWhenTheyAre()
    {
        // Create a user so we pass authentication.
        $user = User::factory()->create();

        Set::factory()->create([
           'owner_id' => $user->id,
         ]);

        // Check the endpoint is still working.
        $response = $this->actingAs($user)->get('/');

        // Delete user as no longer required and don't want to clutter database.
        $user->delete();

        // Now user sets should no longer be present in the database.
        $sets = Set::where('owner_id', $user->id)->first();
        $this->assertNull($sets);
    }
}
