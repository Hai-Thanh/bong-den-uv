<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [
                [
                    'name' =>"Lê Duy Sơn",
                    'email'=>"sonldph11925@fpt.edu.vn",
                    'password'=>'123456789',
                    'phone_number' => '0972618741'
                ],

                [
                    'name' =>"Lê Duy Trương",
                    'email'=>"truongldph11925@fpt.edu.vn",
                    'password'=>'123456789',
                    'phone_number' => '0362821173'
                ]
            ];
      
        foreach($data as $item){
            $user =  new User();
            $user->name = $item['name'];
            $user->email = $item['email'];
            $user->password = Hash::make($item['password']);
            $user->phone_number= $item['phone_number'];
            $user->save();
        }



        
    }
}
