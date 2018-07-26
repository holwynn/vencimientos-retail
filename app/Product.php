<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'upc',
        'qty',
        'expiration'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
