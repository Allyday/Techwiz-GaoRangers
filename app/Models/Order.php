<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    public $fillable = ['userId', 'restaurantId', 'timeCreated', 'address', 'is_active', 'totalDishPrice', 'deliveryFee'];
}
