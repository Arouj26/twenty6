<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $appends = ['customerQuantity'];

    public function getCustomerQuantityAttribute()
    {
        // Retrieve the customer quantity from the cart
        $cart = session()->get('cart', []);
        $productId = $this->id;
        return isset($cart[$productId]) ? $cart[$productId]['quantity'] : 0;
    }

}
