<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\SupplierOrder;
use App\Models\SupplierOrderDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class SupplierOrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $orders = SupplierOrder::all();

        foreach ($orders as $order) {
            // Crea entre 1 y 3 detalles por orden
            foreach (range(1, rand(1, 3)) as $index) {
                $product = Product::inRandomOrder()->first();

                SupplierOrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $faker->numberBetween(1, 10),
                    'price' => $product->price
                ]);
            }
        }
    }
}
