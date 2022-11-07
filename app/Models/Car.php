<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperCar
 */
class Car extends Model
{
    use HasFactory;

    protected $guarded = [];
}
