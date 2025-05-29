<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('categories')->insert([
        //     'category_name' => Str::random(10)
        // ]);
        Category::insert([
            ['category_name' => 'Laptop'],
            ['category_name' => 'Loa'],
        ]);
    }
}
