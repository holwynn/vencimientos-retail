<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Expiration extends Model
{
    protected $fillable = [
        'qty',
        'expiration'
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
