<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'users';

    protected $fillable = [
        'phoneNumber',
        'userName',
        'firstName',
        'lastName',
        'password',
        'gender',
        'picture',
        'mail',
        'type',
        'restaurantId'
    ];

    public $timestamps = false;
}
