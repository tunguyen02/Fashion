<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    use HasFactory;

    protected $table = 'product_details';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function products(){
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }
}
