<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        foreach (range(1, 5) as $index) {
            Supplier::create([
                'name' => $faker->company,
                'contact' => $faker->name,
                'phone' => $faker->phoneNumber
            ]);
        }
    }
}
