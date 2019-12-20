<?php

declare(strict_types=1);

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parent_id',
        'name',
    ];

    # Accessors & Mutators

    # Relationships
    public function category()
    {

        return $this->belongsTo(Category::class, 'parent_id')->withDefault();
    }
}
