<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    protected $table = 'order_details';
    protected $fillable = ['order_id', 'product_id',
                        'quantity', 'unitprice',
                        'amount', 'discount'];

    use HasFactory;
}
