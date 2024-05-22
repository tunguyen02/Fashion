<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function brands(){
        return $this->belongsTo(Brands::class, 'brand_id', 'id');
    }

    public function productCategory(){
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }

    public function productImages(){
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function productDetails(){
        return $this->hasMany(ProductDetails::class, 'product_id', 'id');
    }

    public function productComments(){
        return $this->hasMany(ProductComments::class, 'product_id', 'id');
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetails::class, 'product_id', 'id');
    }
}
