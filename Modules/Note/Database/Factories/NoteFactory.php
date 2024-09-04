<?php

namespace Modules\Note\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Note\Models\Note::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'content' => fake()->text(),
        ];
    }
}

