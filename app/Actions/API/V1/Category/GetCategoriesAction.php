<?php

namespace App\Actions\API\V1\Category;

use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;

class GetCategoriesAction
{
    /**
     * Get categories
     */
    public function execute(): LengthAwarePaginator
    {
        return Category::paginate(15);
    }
}
