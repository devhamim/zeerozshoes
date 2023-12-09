<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class CustomerAuth extends Authenticatable
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $guard = 'customerauth';

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
