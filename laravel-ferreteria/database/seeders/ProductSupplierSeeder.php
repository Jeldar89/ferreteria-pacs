<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtén todos los productos y proveedores
        $products = Product::all();
        $suppliers = Supplier::all();

        // Asocia productos con proveedores aleatorios
        foreach ($products as $product) {
            $product->suppliers()->attach(
                $suppliers->random(rand(1, 2))->pluck('id')->toArray() // Asocia entre 1 y 2 proveedores por producto
            );
        }
    }
}
