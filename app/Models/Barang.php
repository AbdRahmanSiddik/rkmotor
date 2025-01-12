<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $primaryKey = 'kode_barang';
    protected $keyType = 'string';
    protected $guarded = [];

    function getRouteKey()
    {
        return 'kode_barang';
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function pembayaran()
    {
        return $this->belongsToMany(Pembayaran::class, 'detail_pembayarans', 'barang_id', 'pembayaran_id')->withPivot('kuantitas');
    }
}
