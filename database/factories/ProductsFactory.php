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

        // $imgName = $this->faker->image(storage_path("app/public/storage/product"), $width = 640, $height = 480, false);

        return [
            'name' => $this->faker->name(),
            'category_id' =>Categories::all()->random()->id,
            'feature_image_path' => 'https://picsum.photos/640/480',
            'feature_image_name' => 'https://picsum.photos/640/480',
            'price' =>rand(1,500),
            'status' => rand(0,3),
            'quantity'=>rand(1,300) ,
            'content'=>$this->faker->paragraph,
        ];
    }
}
