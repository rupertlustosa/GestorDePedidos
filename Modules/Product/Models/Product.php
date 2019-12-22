<?php

declare(strict_types=1);

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'name',
        'image',
        'notes',
    ];

    # Accessors & Mutators

    # Relationships
    public function category()
    {

        return $this->belongsTo(Category::class)->withDefault();
    }
}
