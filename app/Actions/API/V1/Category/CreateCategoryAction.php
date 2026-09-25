<?php

namespace App\Actions\API\V1\Category;

use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CreateCategoryAction
{
    /**
     * create category
     * 
     * @param array $data
     * @return Category $category
     */
    public function execute(array $data): Category
    {
        return DB::transaction(function () use ($data) {

            if (isset($data['image'])) {
                $data['image'] = $data['image']->store('categories', 'public');
            }

            $category = Category::create([
                'name' => $data['name'],
                'image' => $data['image'] ?? null,
                'short_description' => $data['short_description'],
                'full_description' => $data['full_description'],
            ]);

            return $category;
        });
    }
}
