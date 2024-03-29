<?php

namespace Database\Factories;

use App\Models\Set;
use Illuminate\Database\Eloquent\Factories\Factory;

class SetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Set::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'set_title' => $this->faker->catchPhrase,
          'category' => "",
          'is_favourite' => 0,
          'creation_date' => date('Y-m-d'),
        ];
    }
}
