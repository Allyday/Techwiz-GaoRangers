<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDish extends Model
{
    use HasFactory;
    protected $table = 'orderdish';
    public $timestamps = false;
    public $fillable = ['orderId', 'dishId', 'dishQuantity'];
}
