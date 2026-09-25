<?php

namespace App\Actions\API\V1\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class DeleteProductAction
{
    /**
     * Delete product
     * 
     * @param Product $product
     * @return bool|null
     */
    public function execute(Product $product): bool|null
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        return $product->delete();
    }
}
