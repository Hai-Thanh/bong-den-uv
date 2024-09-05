<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Products;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Tạo 10 danh mục ngẫu nhiên
        Categories::factory(10)->create();
        // Tạo 20 sản phẩm ngẫu nhiên
        Products::factory(20)->create();





        // Thêm người dùng admin với thông tin cố định
        $new_user = [
            'name' => "admin",
            'email' => "admin@gmail.com",
            'password' => Hash::make('12345678'),
            'phone_number' => '0362821173',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        // Tạo người dùng admin trong cơ sở dữ liệu
        \App\Models\User::create($new_user);

        // Tạo 10 người dùng ngẫu nhiên khác
        User::factory(10)->create();
    }
}
