<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountCode extends Model
{
    use HasFactory;
    protected $table = 'discount_codes';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $fillable = ['id','code', 'discountType', 'orderMin', 'startDate', 'endDate', 'is_active', 'created_at', 'updated_at', 'amountDiscounted', 'percentDiscounted'];

}
