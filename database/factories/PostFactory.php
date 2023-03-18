<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->word,
            'author' => $this->faker->name,
            'content' => $this->faker->word,
            'image' => UploadedFile::fake()->image('post.png')->move(public_path('uploaded/post'), time() . '_post.png'),
            'date' => $this->faker->date
        ];
    }
}
