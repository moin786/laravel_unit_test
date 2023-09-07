<?php

namespace Peal\CorePackages\Category\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Peal\CorePackages\SubCategory\Models\SubCategory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','category_parent'];

    public function child()
    {
        return $this->hasMany(SubCategory::class,'category_parent','id');
    }
}
