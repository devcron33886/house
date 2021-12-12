<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [ 'name'=>'Living House'],
            ['name' => 'Apartment'],
            ['name' => 'Commercial House'],
        ];

        Category::insert($categories);

    }
}
