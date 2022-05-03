<?php

namespace Database\Seeders;

use App\Models\Website;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Website::truncate();

        $faker = Factory::create();

        // And now, let's create a few websites in our database:
        for ($i = 0; $i < 5; $i++) {
            Website::create([
                'domain' => $faker->domainName(),
            ]);
        }
    }
}
