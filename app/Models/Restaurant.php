<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $table = 'restaurants';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['name', 'city', 'district', 'municipality', 'street', 'houseNumber', 'keywords'];
}
