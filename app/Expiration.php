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

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function getExpirationFormatedAttribute()
    {
        return $this->expiration->format('m-d-Y');
    }

    public function getDiffLocalizedAttribute()
    {
        setlocale(LC_TIME, 'es_AR.utf8');
        Carbon::setLocale('es');
        return ucfirst($this->expiration->diffForHumans());
    }

    public function expirationLocalized($year = false)
    {
        // apparently you don't need to set carbon::utf8 if your
        // locale is already utf8
        setlocale(LC_TIME, 'es_AR.utf8');
        Carbon::setLocale('es');

        if (!$year) {
            return ucfirst($this->expiration->formatLocalized('%A, %d de %B'));
        }

        return ucfirst($this->expiration->formatLocalized('%A, %d de %B de %Y'));
    }

    public function isExpired()
    {
        $today = Carbon::now();
        $days = $today->diffInDays($this->expiration, false);

        if ($days <= 0) {
            return true;
        }
    }
}
