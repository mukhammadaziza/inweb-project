<?php

namespace App\Actions\API\V1\Product;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CreateProductAction
{
    /**
     * Create new product
     * 
     * @param array $data
     * @return Product $product
     */
    public function execute(array $data): Product
    {
        return DB::transaction(function () use ($data) {

            if (isset($data['image'])) {
                $data['image'] = $data['image']->store('products', 'public');
            }

            $product = Product::create([
                'category_id' => $data['category_id'],
                'name' => $data['name'],
                'image' => $data['image'] ?? null,
                'short_description' => $data['short_description'],
                'full_description' => $data['full_description'],
            ]);

            return $product;
        });
    }
}
