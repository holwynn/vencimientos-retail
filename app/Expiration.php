<?php

namespace App;

use App\Product;
use App\Store;
use Carbon\Carbon;
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

    public function store() {
        return $this->belongsTo(Store::class);
    }

    public function getExpirationFormatedAttribute()
    {
        return $this->expiration->format('m-d-Y');
    }

    public function getExpirationLocalizedAttribute()
    {
        setlocale(LC_TIME, 'es_AR');
        Carbon::setLocale('es');
        Carbon::setUtf8(true);
        return ucfirst($this->expiration->formatLocalized('%A, %d de %B'));
    }

    public function getDiffLocalizedAttribute()
    {
        setlocale(LC_TIME, 'es_AR');
        Carbon::setLocale('es');
        Carbon::setUtf8(true);
        return ucfirst($this->expiration->diffForHumans());
    }

    public function isExpired()
    {
        if ($this->date) {
            # code...
        }
    }
}
