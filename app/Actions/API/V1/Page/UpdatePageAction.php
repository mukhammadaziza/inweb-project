<?php

namespace App\Actions\API\V1\Page;

use App\Models\Page;
use Illuminate\Support\Facades\DB;

class UpdatePageAction
{
    /**
     * Update page
     * 
     * @param array $data
     * @param Page $page
     * @return Page $page
     */
    public function execute(array $data, Page $page): Page
    {
        return DB::transaction(function () use ($data, $page) {
            $page->update($data);

            return $page;
        });
    }
}
