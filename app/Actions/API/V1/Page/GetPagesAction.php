<?php

namespace App\Actions\API\V1\Page;

use App\Models\Page;

class GetPagesAction
{
    /**
     * Get pages
     */
    public function execute()
    {
        return Page::all();
    }
}
