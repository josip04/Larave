<?php

namespace Database\Factories;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Posts::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            /**
             * for title paragraph gives error
             * 1406 data too long for column title
             * this is why we use sentence
             */
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
            'image' => $this->faker->sentence,
            'user_id' => User::all()->random()->id
        ];
    }
}
