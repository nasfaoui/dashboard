<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Service;
use App\Models\User;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $userIds = User::pluck('id')->toArray();
        $categoryIds = Categorie::pluck('id')->toArray();
        for ($i = 0; $i < 10; $i++) {
             // Generate random user ID and category ID
    $userId = $faker->randomElement($userIds);
    $categoryId = $faker->randomElement($categoryIds);
            Service::create([
                'title' => $faker->sentence(5),
                'description' => $faker->paragraph(3),
                'user_id' => $userId,
                'category_id' => $categoryId,
                'price' => $faker->randomFloat(2, 10, 1000),
                'location' => $faker->address,
                'created_at' => $faker->dateTimeBetween('-1 week', 'now')
            ]);
        }
        //
    }
}
