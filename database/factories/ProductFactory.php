<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => Str::random(4),
            'price' => rand(100,10000000000),
            'description' =>$this->faker->text,
            'image' => $this->faker->image('storage/app/public/uploads',640,480, null, false)
        ];
    }
}
