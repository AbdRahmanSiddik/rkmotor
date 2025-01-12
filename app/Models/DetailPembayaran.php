<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DetailPembayaran extends Model
{
    use HasFactory;
    protected $primaryKey = 'kode_detail_pembayaran';
    protected $keyType = 'string';
    protected $guarded = [];

    function getRouteKey()
    {
        return 'kode_detail_pembayaran';
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->kode_detail_pembayaran)) {
                $model->kode_detail_pembayaran = Str::random(16);
            }
        });
    }

}
