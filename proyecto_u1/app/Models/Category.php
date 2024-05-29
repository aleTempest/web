<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey = 'cat_id';
    protected $fillable = [ 'cat_name' ];


    // Relación de uno a uno, una categoría tiene un producto
    public function product(): HasOne
    {
        return $this->hasOne(Product::class,'product_id');
    }
}
