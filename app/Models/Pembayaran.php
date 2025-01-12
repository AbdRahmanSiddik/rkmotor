<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $primaryKey = 'kode_pembayaran';
    protected $keyType = 'string';
    protected $guarded = [];

     function getRouteKey()
     {
        return 'kode_pembayaran';
     }

     public function barang()
     {
         return $this->belongsToMany(Barang::class, 'detail_pembayarans', 'pembayaran_id', 'barang_id')
                     ->withPivot('kuantitas');
     }

}
