<?php

namespace App\Actions\API\V1\Category;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateCategoryAction
{
    /**
     * @param array $data
     * @param Category $category
     * @return Category $category
     */
    public function execute(array $data, Category $category): Category
    {
        return DB::transaction(function () use ($data, $category) {
            if (isset($data['image'])) {
                if ($category->image) {
                    Storage::disk('public')->delete($category->image);
                }
                $data['image'] = $data['image']->store('categories', 'public');
            }

            $category->update($data);

            return $category;
        });
    }
}
