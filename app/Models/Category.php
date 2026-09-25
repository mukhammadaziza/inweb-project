<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'image',
        'short_description',
        'full_description',
    ];

    /**
     * One category has many products
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
