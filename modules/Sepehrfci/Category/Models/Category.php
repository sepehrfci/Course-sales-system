<?php

namespace Sepehrfci\Category\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $parent
 * @property mixed $parent_id
 * @property mixed $parentCategory
 */
class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function getParentAttribute()
    {
        return is_null($this->parent_id) ? 'ندارد' : $this->parentCategory->title;
    }


}
