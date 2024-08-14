<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Roles extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'roles';
    protected $fillable = [
        'position',
        'is_active',
    ];
}
