<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
               'name'=>'Sandesh Admin',
               'email'=>'admin@gmail.com',
               'phone'=>'+911234567890',
               'type'=>1,
               'password'=> Hash::make('123456'),
            ],
            [
               'name'=>'Sandesh User',
               'email'=>'user@gmail.com',
               'phone'=>'+910987654321',
               'type'=>0,
               'password'=> Hash::make('123456'),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
