<?php

namespace Database\Factories;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use Intervention\Image\Image;


class ProductsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Products::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categories = Categories::all();

        return [
            'name' => $this->faker->name(),
            'category_id' => $categories->isNotEmpty() ? $categories->random()->id : null, // Hoặc giá trị mặc định
            'feature_image_path' => 'https://picsum.photos/640/480',
            'feature_image_name' => 'https://picsum.photos/640/480',
            'price' => rand(1, 500),
            'status' => rand(0, 3),
            'quantity' => rand(1, 300),
            'content' => $this->faker->paragraph,
        ];
    }
}
