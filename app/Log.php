<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'date',
        'level',
        'type',
        'model_id',
        'user_id',
        'message'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeProducts($query)
    {
        return $query->where('type', 'products');
    }

    public function scopeExpirations($query)
    {
        return $query->where('type', 'expirations');
    }

    public function scopeUsers($query)
    {
        return $query->where('type', 'users');
    }

    public function scopeModel($query, $model)
    {
        return $query->where('model_id', $model->id);
    }
}
