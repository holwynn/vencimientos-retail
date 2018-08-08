<?php

namespace App;

use App\Product;
use App\Store;
use Illuminate\Database\Eloquent\Model;

class Expiration extends Model
{
    protected $fillable = [
        'qty',
        'expiration'
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function store() {
        return $this->belongsTo(Store::class);
    }
}
