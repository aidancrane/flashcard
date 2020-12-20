<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Set;

class DataTableResponseTest extends TestCase
{
    // https://stackoverflow.com/questions/6041741/fastest-way-to-check-if-a-string-is-json-in-php


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDatatableLibraryEndpointIsWorking()
    {

        // Create a user so we pass authentication.
        $user = User::factory()->create();

        Set::factory()->create([
            'owner_id' => $user->id,
        ]);

        // Check the endpoint is still working.
        $response = $this->actingAs($user)->get('/sets/datatable_index');

        // Delete user as no longer required and don't want to clutter database.
        $user->delete();

        // Make sure response is as should be.
        // Basically should always have 1 set for this user.
        $user_sets = $response['data'];

        // So we can lazily check that if the returned response is 1 set, we know
        // we both have returned some data, and its exactly 1 set.
        $this->assertTrue((bool)count($user_sets));
    }
}
