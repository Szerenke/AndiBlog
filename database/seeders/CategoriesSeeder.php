<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'category_name' => 'Téma01',
                'category_colour' => 'dark',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Téma02',
                'category_colour' => 'primary',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Téma03',
                'category_colour' => 'secondary',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
