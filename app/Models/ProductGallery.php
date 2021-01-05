<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProductGallery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'products_id', 'photo', 'is_default'
    ];

    protected $hidden = [];

    //fungsi yang di panggil 'product'
    public function product()
    {
        // relasi prodoct->productgallery (anggota/milik product)
        //tb_prductgallery.products_id = tb_product.id
        // Product -> adalah nama fungsi yang akn dipakai
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }

    // Accessors & Mutators untuk link gambar
    public function getPhotoAttribute($value)
    {
        return url('storage/' . $value);
    }
}
