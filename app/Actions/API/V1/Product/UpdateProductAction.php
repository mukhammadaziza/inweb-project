<?php

namespace App\Actions\API\V1\Product;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateProductAction
{
    /**
     * Update product
     * 
     * @param array $data
     * @param Product $product
     * @return Product $product
     */
    public function execute(array $data, Product $product): Product
    {
        return DB::transaction(function () use ($data, $product) {

            if (isset($data['image'])) {
                if ($product->image) {
                    Storage::disk('public')->delete($product->image);
                }
                $data['image'] = $data['image']->store('products', 'public');
            }

            $product->update($data);

            return $product;
        });
    }
}
