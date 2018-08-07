<?php

namespace App;

use App\User;
use App\Expiration;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public const WALMART_URL = 'https://www.walmart.com.ar/api/catalog_system/pub/products/search?ft=';

    protected $fillable = [
        'name',
        'upc',
        'img',
    ];

    public function fromWalmart($upc) {
        $res = file_get_contents(self::WALMART_URL . $upc);
        $json = json_decode($res);

        if (!$json) {
            return false;
        }

        $this->upc = $upc;
        $this->name = $json[0]->productName;
        $this->img = $json[0]->items[0]->images[0]->imageUrl;

        return $this;
    }

    public function expirations() {
        return $this->hasMany(Expiration::class);
    }
}
