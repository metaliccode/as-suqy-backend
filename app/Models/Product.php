<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //hapus sementara
    use SoftDeletes;

    // input file full sekaligus (mass asigment)
    protected $fillable = [
        'name', 'type', 'description', 'price', 'slug', 'quantity'
    ];

    // inputan yag dihilangkan
    protected $hidden = [];

    //relasi table
    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, 'products_id');
    }
}
