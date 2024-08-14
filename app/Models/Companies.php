<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Companies extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'companies';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'logo',
        'is_active',
    ];
}
