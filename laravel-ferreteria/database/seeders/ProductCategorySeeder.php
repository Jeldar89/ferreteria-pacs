<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Obtén todos los productos y categorías
         $products = Product::all();
         $categories = Category::all();
 
         // Asocia productos con categorías aleatorias
         foreach ($products as $product) {
             $product->categories()->attach(
                 $categories->random(rand(1, 2))->pluck('id')->toArray() // Asocia entre 1 y 2 categorías por producto
             );
         }
    }
}
