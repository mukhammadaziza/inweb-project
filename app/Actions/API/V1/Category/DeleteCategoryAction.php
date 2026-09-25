<?php

namespace App\Actions\API\V1\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class DeleteCategoryAction
{
    /**
     * Delete category 
     * 
     * @param Category $category
     * @return bool|null
     */
    public function execute(Category $category): bool|null
    {
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        return $category->delete();
    }
}
