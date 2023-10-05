<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdduserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                User::create([
            "name"           => "bayu", 
            "email"          => "bayu@gmail.com", 
            "Profile"          => "",
            "level"          => "Admin", 
            "password"       => \bcrypt('bayu12345')
        ]);
        User::create([
            "name"           => "BlackCat", 
            "email"          => "BlackCat@gmail.com", 
            "Profile"          => "",
            "level"          => "Admin", 
            "password"       => \bcrypt('admin123')
         ]);
    }
}