<?php

namespace App\Actions\API\V1\Product;

use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class GetProductsAction
{
    /**
     * Get products
     */
    public function execute(): LengthAwarePaginator
    {
        return Product::with('category')->paginate(15);
    }
}
