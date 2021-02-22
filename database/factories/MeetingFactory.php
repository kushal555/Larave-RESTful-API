<?php

namespace Database\Factories;

use App\Models\Meeting;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MeetingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Meeting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(5),
            'description' => $this->faker->text,
            'time' => $this->faker->dateTime,
            'user_id' => User::all()->random()->id,
            'created_at'    =>  now(),
            'updated_at'   => now()
        ];
    }
}
