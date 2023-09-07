<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Peal\CorePackages\Category\Contracts\CategoryContract;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(CategoryContract $category)
    {
        $this->category = $category;
    }
    
    public function create()
    {
        return Inertia::render('Category/Category');
    }

    public function store(CategoryRequest $request)
    {
        $this->category->add($request->all());
        return redirect()->route('create-category')->with('success','Category created successfully');
    }

    public function category_records()
    {
        echo $this->category->get_categories();
    }

    public function update(Request $request)
    {
        $this->category->update($request->all(), $request->id);
        return redirect('create-category')->with('success', 'Category updated Successfully');
    }

    public function destroy($id)
    {
        $this->category->delete($id);
        return redirect('create-category')->with('success', 'Category deleted Successfully');
    }
}
