<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    public function add_products(Request $category_name){
        $category_name->category=$category_name['products-category'];
    }

}
