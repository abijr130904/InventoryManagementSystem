<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'kode_produk',
        'nama_produk',
        'kategori',
        'harga_beli',
        'harga_jual',
        'stok',
        'satuan',
        'gambar',
    ];
    
    /**
     * Get the transactions associated with the product.
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
