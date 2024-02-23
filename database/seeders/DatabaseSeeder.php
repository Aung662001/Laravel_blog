<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Blog::truncate();
        Category::truncate();
        $frontend = Category::factory()->create(["name" => "frontend","slug" => "frontend"]);
        $backend = Category::factory()->create(["name" => "backend","slug" => "backend"]);
        // \App\Models\User::factory(10)->create();
        // \App\Models\Blog::factory(10)->create();
       $user1 =  User::factory()->create();
       $user2 =  User::factory()->create();
        Blog::factory(5)->create([
            "category_id" => $frontend,
            "user_id" => $user1
        ]);
        Blog::factory(5)->create([
            "category_id" => $backend,
            "user_id" => $user2
        ]);
    }
}
