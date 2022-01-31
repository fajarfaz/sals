<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
 public function index()
 {
    $category = Category::latest()->paginate(5);
    
    return view('admin.category.index',compact('category'))
    ->with('i', (request()->input('page', 1) - 1) * 5);
    
}

public function create()
{
    return view('admin.category.create');
}

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index')
        ->with('success','Category deleted successfully');
    }
}
