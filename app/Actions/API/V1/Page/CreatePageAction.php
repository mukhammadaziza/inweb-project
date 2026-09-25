<?php

namespace App\Actions\API\V1\Page;

use App\Models\Page;
use Illuminate\Support\Facades\DB;

class CreatePageAction
{
    /**
     * Create a page
     * 
     * @param array $data
     * @return Page $page
     */
    public function execute(array $data): Page
    {
        return DB::transaction(function () use ($data) {

            $page = Page::create([
                'name' => $data['name'],
                'short_description' => $data['short_description'],
                'full_description' => $data['full_description'],
            ]);

            return $page;
        });
    }
}
