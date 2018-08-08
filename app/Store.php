<?php

namespace App;

use App\Expiration;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        'name',
        'website',
        'email',
        'phone',
        'address'
    ];

    public function expirations() {
        return $this->hasMany(Expiration::class);
    }
}
