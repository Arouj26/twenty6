<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Model\ProductCategory;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('product_category')->insert(
            array(
            array(
                    'category_name' => 'Coats',
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ),
                array(
                    'category_name' => 'Dresses',
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ),
                array(
                    'category_name' => 'Shirts',
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ),
                array(
                    'category_name' => 'T-Shirts',
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ),
                array(
                    'category_name' => 'Jeans',
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ),
                array(
                    'category_name' => 'Bags',
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ),
                array(
                    'category_name' => 'Jewellry',
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ),
                array(
                    'category_name' => 'Flatshoes',
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ),array(
                    'category_name' => 'Boots',
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ),array(
                    'category_name' => 'Highheels',
                    'created_at'=>now(),
                    'updated_at'=>now(),
                )
            )
                );
    }

}
