<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Set;

class SetFactoryTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSetFactoryIsWorking()
    {
        $user = User::factory()->create();
        Set::factory()->count(30)->create([
        'owner_id' => $user->id,
         ]);
        $user->save();
        $this->assertEquals(30, count($user->sets()->get()));
    }
}
