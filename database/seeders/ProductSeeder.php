<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    use SoftDeletes;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()->count(5)->create();
    }
}
