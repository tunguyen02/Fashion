<?php

namespace App\Repositories\Product;

use App\Models\Products;
use App\Repositories\BaseRepositories;

class ProductRepository extends  BaseRepositories implements  ProductRepositoryInterface
{

    public function getModel()
    {
        return Products::class;
    }
}
