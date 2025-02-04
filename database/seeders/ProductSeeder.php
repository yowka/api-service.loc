<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = Category::where('name', 'Электроника')->first();
        Product::create([
            'name' => 'Наушники',
            'description' => 'Самые крутые наушники в мире ...',
            'price' => 3599.99,
            'quantity' => 59,
            'category_id' => $category->id,
        ]);
        $category = Category::where('name', 'Бытовая техника')->first();
        Product::create([
            'name' => 'Пылесос',
            'description' => 'Самый крутой пылесос в мире ...',
            'price' => 13599.99,
            'quantity' => 9,
            'category_id' => $category->id,
        ]);
    }
}
