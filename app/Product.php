<?php

namespace App;

use App\User;
use App\Expiration;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'upc',
        'qty',
        'img',
        'expiration'
    ];

    protected $hidden = [
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function expirations() {
        return $this->hasMany(Expiration::class);
    }
}
