<?php

namespace App;

use App\Product;
use App\Store;
use Illuminate\Database\Eloquent\Model;

class Expiration extends Model
{
    protected $fillable = [
        'qty',
        'expiration',
        'checked',
    ];

    protected $dates = [
        'expiration',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function getExpirationFormated()
    {
        return $this->expiration->format('m-d-Y');
    }

    public function store() {
        return $this->belongsTo(Store::class);
    }
}
