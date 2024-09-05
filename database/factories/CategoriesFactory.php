<?php

namespace Database\Factories;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoriesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Categories::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word, // Thay đổi từ `name()` thành `word()` để tạo các từ đơn giản
            'parent_id' => $this->faker->boolean ? $this->faker->numberBetween(1, 10) : null, // Có thể là 0 hoặc ID của một danh mục khác
            'slug' => Str::slug($this->faker->unique()->word), // Tạo slug từ tên danh mục
        ];
    }
}
