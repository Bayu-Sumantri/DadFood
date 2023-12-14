<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdduserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            "name"           => "bayu",
            "email"          => "bayu@gmail.com",
            "Profile"          => "",
            "password"       => \bcrypt('bayu12345'),
            "remember_token"    => Str::random(10)
        ]);
        $user->assignRole('user');
        $user = User::create([
            "name"           => "BlackCat",
            "email"          => "BlackCat@gmail.com",
            "Profile"          => "",
            "password"       => \bcrypt('admin123'),
            'remember_token'    => Str::random(10)
         ]);
         $user->assignRole('admin');
    }

}
