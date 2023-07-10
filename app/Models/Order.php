<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model\Customer;
class Order extends Model
{
    use HasFactory;
    public function customer()
{
    return $this->belongsTo(Customer::class, 'customerid');
}
}
