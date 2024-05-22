<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    protected $table = 'order_details';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function orders(){
        return $this->belongsTo(Orders::class, 'order_id', 'id');
    }

    public function products(){
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }
}
