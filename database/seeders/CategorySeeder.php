<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Category::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            'Kebaya', 'Gaun Pengantin', 'Kostum Halloween', 'Kostum Tari', 'Kostum Profesi'
        ];

        foreach($data as $value)
        {
            Category::insert(['name' => $value]);
        }
    }
}
