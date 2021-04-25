<?php

namespace Database\Seeders;

use App\Models\Category;
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
        $cat = Category::create([
            'cat_name' => 'Pengumuman',
            'cat_slug' => Str::slug('Pengumuman'),
        ]);

        $cat = Category::create([
            'cat_name' => 'PTS',
            'cat_slug' => Str::slug('pts'),
        ]);
        $cat = Category::create([
            'cat_name' => 'PAS',
            'cat_slug' => Str::slug('pas'),
        ]);




    }
}
