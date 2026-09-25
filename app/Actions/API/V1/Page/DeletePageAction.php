<?php

namespace App\Actions\API\V1\Page;

use App\Models\Page;

class DeletePageAction
{
     /**
     * Delete page 
     * 
     * @param Page $page
     * @return bool|null
     */
    public function execute(Page $page): bool|null
    {
        return $page->delete();
    }
}
