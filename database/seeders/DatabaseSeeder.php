<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'name' => 'Brito Lazaro da Conceicao',
            'username' => 'brito',
            'email' => 'brito@gmail.com',
            'password' => bcrypt('12345')
        ]);

        User::create([
            'name' => 'Adriana Madalena Lopes Magno',
            'username' => 'adriana',
            'email' => 'adriana@gmail.com',
            'password' => bcrypt('54321')
        ]);

        User::factory(3)->create();

        Category::create([
            'name' => 'Programming',
            'slug' => 'pragramming'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'Personal'
        ]);

        Post::factory(20)->create();
    }
}
