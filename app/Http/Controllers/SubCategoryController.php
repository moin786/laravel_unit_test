<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Peal\CorePackages\SubCategory\Contracts\SubCategoryContract;

class SubCategoryController extends Controller
{
    protected $subcategory;

    public function __construct(SubCategoryContract $subcategory)
    {
        $this->subcategory = $subcategory;
    }

    public function create()
    {
        return Inertia::render('SubCategory/SubCategory');
    }
}
