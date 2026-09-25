<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'image',
        'short_description',
        'full_description',
    ];

    /**
     * One product belongs to one category
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
