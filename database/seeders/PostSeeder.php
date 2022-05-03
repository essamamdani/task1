<?php

namespace Database\Seeders;

use App\Models\Post;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Post::truncate();

        $faker = Factory::create();

        // And now, let's create a few post with website_id in our database:
        for ($i = 0; $i < 50; $i++) {
            Post::create([
                'title' => $faker->sentence(8),
                'description' => $faker->text(2000),
                'is_active' => true,
                'website_id'=>rand(1,5),
            ]);
        }
    }
}
