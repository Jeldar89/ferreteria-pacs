<?php

namespace Database\Seeders;

use App\Models\Supplier;
use App\Models\SupplierOrder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SupplierOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Crea algunas órdenes de proveedores
        foreach (range(1, 5) as $index) {
            $supplier = Supplier::inRandomOrder()->first(); // Selecciona un proveedor aleatorio

            SupplierOrder::create([
                'supplier_id' => $supplier->id,
                'total' => $faker->randomFloat(2, 100, 500),
                'date' => $faker->dateTimeThisYear()
            ]);
        }
    }
}
