<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'   => $this->faker->sentence(),
            'content' => $this->faker->text(),
            // Al pasar como último parámetro false, no se almacena el path, solo el nombre de la imagen, por eso se concatena
            'image'   => 'posts/' . $this->faker->image('public/storage/posts', 640, 480, null, false) //posts/image1.jpg
        ];
    }
}
