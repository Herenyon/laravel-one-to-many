<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        $categories = ['Php', 'Blade', 'Html', 'Laravel', 'Javascript'];

        foreach ($categories as $category) {
            $new_category = new Category();
            $new_category->name = $category;
            $new_category->slug = Str::slug($new_category->name);
            $new_category->save();
        }
    }
}
