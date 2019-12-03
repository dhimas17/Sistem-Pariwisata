<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $fillable = [
        'username', 'password', 'email', 'telepon',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
